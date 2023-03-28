<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    //配列の変数で渡してあげて
    //     //コントローラーから連想配列で渡す方法を調べる
    //     //配列で送信出来ればいちいち変数を宣言してあげなくても配列の中から選択して取れる
    //     //ララベルで配列で渡せるようにしたい
    //クッキーに残して履歴が削除されない限り再度ブラウザを開いたら自分のアカウントが開くようにする。

    //サインイン時ユーザー確認
    public function login(Request $request)
    {
        //パスワード・IDの正規表現
        $correct_id = '/\A[a-z\d]{4,32}+\z/i';
        $correct_pass = '/\A[a-z\d]{8,32}+\z/i';

        //入力されたID・passwordの取得
        $get_user_id = $request->input('UserID');
        $get_password = $request->input('PassWord');

        //正規確認
        $result_id = preg_match($correct_id, $get_user_id);
        $result_pass = preg_match($correct_pass, $get_password);


        if ($get_user_id != null && $get_password != null) {
            if ($result_id && $result_pass) {

                $response = Http::asForm()->post('http://ec2-13-114-120-22.ap-northeast-1.compute.amazonaws.com/accessDB.php', [
                    'query_name0' => 'get_all_user_except_image',
                ]);

                $decode = json_decode($response, true);
                $login_user_id = current(array_filter($decode, fn ($v) => $v['userID'] == $get_user_id && $v['password'] == $get_password));
                $login_user_pass = current(array_filter($decode, fn ($v) => $v['userID'] == $get_user_id && $v['password'] == $get_password));
                $login_user_name = current(array_filter($decode, fn ($v) => $v['userID'] == $get_user_id && $v['password'] == $get_password));


                if (!$login_user_id || !$login_user_pass) {

                    $response = "登録されていません。";
                    return view('layout/login', compact('response'));
                } else {
                    $correct_user_id = $login_user_id["userID"];
                    $correct_password = $login_user_pass["password"];
                    $correct_name = $login_user_name["userName"];
                    //ログイン成功時

                    //自分が所属するワークスペースを所得しホームに表示する(URLは別のファイルにしてそれを呼び出す。)
                    $w_response = Http::asForm()->post('http://ec2-13-114-120-22.ap-northeast-1.compute.amazonaws.com/accessDB.php', [
                        'query_name0' => 'web_my_workspace',
                        'userID' => $correct_user_id,
                    ]);

                    $w_decode = json_decode($w_response, true);
                    $w_collection = collect($w_decode);


                    //ワークスペースに参加しているmemberの取得
                    $m_response = Http::asForm()->post('http://ec2-13-114-120-22.ap-northeast-1.compute.amazonaws.com/accessDB.php', [
                        'query_name0' => 'web_get_workspace_member',
                        'userID' => $correct_user_id,
                        'userID' => $correct_user_id,
                    ]);

                    $m_decode = json_decode($m_response, true);
                    $m_collection = collect($m_decode);


                    //ワークスペースで作成されたグループの取得
                    $g_response = Http::asForm()->post('http://ec2-13-114-120-22.ap-northeast-1.compute.amazonaws.com/accessDB.php', [
                        'query_name0' => 'web_catch_all_groups',
                        'userID' => $correct_user_id,
                    ]);

                    $g_decode = json_decode($g_response, true);
                    $g_collection = collect($g_decode);

                    return view('/top', compact('correct_user_id', 'correct_password', 'correct_name', 'w_collection','m_collection', 'g_collection'));
                }
            } elseif (!$result_id && !$result_pass) {
                //ユーザIDもパスワードも正しくないとき
                $response = "正しい形式で入力してください";
                return view('layout/login', compact('response'));
            } elseif (!$result_id) {
                //ユーザIDが正しくないとき
                $response = "ユーザーIDは半角英数4~32文字で入力してください。";
                return view('layout/login', compact('response'));
            } else {
                //パスワードが正しくないとき
                $response = "パスワードは半角英数8~32文字で入力してください。";
                return view('layout/login', compact('response'));
            }
        } else {
            if ($get_user_id == null && $get_user_id == null) {
                //すべて空の場合
                $response = "ユーザーIDとパスワードが空白です";
                return view('layout/login', compact('response'));
            } elseif ($get_user_id == null) {
                //ユーザーIDが空の処理
                $response = "ユーザーIDが空白です";
                return view('layout/login', compact('response'));
            } elseif ($get_password == null) {
                //パスワードが空の処理
                $response = "パスワードが空白です";
                return view('layout/login', compact('response'));
            }
        }
    }
}
