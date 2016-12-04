<?php


/**
 * class AuthorizationController
 * @property $client_id
 * @property $client_secret
 * @property $redirect_uri
 */
class AuthorizationController extends AbstractController {

    public function actionAuth() {

        /*генерация ссылки ВК*/
        $url = 'https://oauth.vk.com/authorize';
        $params = array(
            'client_id'     => VK_CLIENT_ID,
            'redirect_uri'  => VK_REDIRECT_URI,
            'response_type' => 'code'
        );
        $this->view->url_auth_vk = $url . '?' . urldecode(http_build_query($params));

        /*генерация ссылки FB*/
        $url = 'https://www.facebook.com/dialog/oauth';
        $params = array(
            'client_id'     => FB_CLIENT_ID,
            'redirect_uri'  => FB_REDIRECT_URI,
            'response_type' => 'code',
            'scope'         => 'public_profile,email',

        );
        $this->view->url_auth_fb = $url . '?' . urldecode(http_build_query($params));

        MainView::display_template($this->view->render("authorization"));
    }

    public function actionAuthVk() {
        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => VK_CLIENT_ID,
                'client_secret' => VK_CLIENT_SECRET,
                'code' => $_GET['code'],
                'redirect_uri' => VK_REDIRECT_URI
            );
            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'],
                    'fields'       => 'uid,first_name,last_name, email',
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
                UserToolsModel::login($this->user);
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/messages/all/');
                die;
            }
        }
    }

    public function actionAuthFB() {

        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => FB_CLIENT_ID,
                'client_secret' => FB_CLIENT_SECRET,
                'code' => $_GET['code'],
                'redirect_uri' => FB_REDIRECT_URI
            );
            $url = 'https://graph.facebook.com/oauth/access_token';
            $tokenInfo = null;
            parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);
            if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
                $params = array('access_token' => $tokenInfo['access_token']);
                $resJson = file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params)));
                $userInfo = json_decode($resJson, true);

                if (isset($userInfo['id'])) {
                    $userInfo = $userInfo;
                    $result = true;
                }
            }
            if ($result) {
                $findUser = UserModel::findOneByColumn('guid',$userInfo['id']);
                if (!$findUser) {
                    $this->user = new UserModel();
                } else{
                    $this->user = $findUser;
                }
                $this->user->full_name = $userInfo['name'];
                $this->user->guid = $userInfo['id'];
                $this->user->save();
                UserToolsModel::login($this->user);
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/messages/all/');
                die;
            }
        }
    }

    public function actionLogout() {
        UserToolsModel::logout();
        $this->IsAuthUser = false;
    }

}