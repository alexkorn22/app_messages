<?php


/**
 * class AuthorizationController
 * @property $client_id
 * @property $client_secret
 * @property $redirect_uri
 * @property $id_author
 */
class AuthorizationController extends AbstractController
{

    public function actionAuth() {

        $this->client_id = VK_CLIENT_ID; // ID приложения
        $this->client_secret = VK_CLIENT_SECRET; // Защищённый ключ
        $this->redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/'; // Адрес сайта

        if ($this->IsGet()) {
            $this->GetAuth($_GET);
            return;
        }
        $url = 'http://oauth.vk.com/authorize';
        $params = array(
            'client_id'     => $this->client_id,
            'redirect_uri'  => $this->redirect_uri,
            'response_type' => 'code'
        );
        $this->view->url_auth_vk = $url . '?' . urldecode(http_build_query($params));
        MainView::display_template($this->view->render("authorization"));
    }

    protected function GetAuth($get) {
        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'code' => $_GET['code'],
                'redirect_uri' => $this->redirect_uri
            );

            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'],
                    'fields'       => 'uid,first_name,last_name',
                    'access_token' => $token['access_token']
                );

                $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['uid'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }
            if ($result) {
                $findUser = UserModel::findOneByColumn('guid',$userInfo['uid']);
                if (!$findUser) {
                    $this->user = new UserModel();
                } else{
                    $this->user = $findUser;
                }
                $this->user->first_name = $userInfo['first_name'];
                $this->user->last_name = $userInfo['last_name'];
                $this->user->full_name = $this->user->first_name . ' ' . $this->user->last_name;
                $this->user->guid = $userInfo['uid'];
                $this->user->save();
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/?ctrl=Messages&act=All');
                die;
            }
        }
    }
}