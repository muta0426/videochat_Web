<?php
// require 'sql_settings.php';

class get_sql {
    public function return_bind_param($query, $param, $types){
        $array = [
            'query_array'=>[$query],
            'param_array'=>[$param],
            'type_array'=>[$types]
        ];
        return $array;
    }

    public function get_user(){
        //SQL文パラメータは?にする
        $query = "select * from m_user where userID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_all_user(){
        //SQL文パラメータは?にする
        $query = "select * from m_user";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

    public function insert_user() {
        //SQL文パラメータは?にする
        $query = "insert into m_user (userID, userName, password, insertDate, updateUserID) values
        (?, ?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "userName",
            "password",
            "insertDate",
            "updateUserID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sssss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_group(){
        //SQL文パラメータは?にする
        $query = "select
                    tg.groupID, tg.groupName, tg.groupImage, tg.delFlg, tg.insertDate, tg.updateDate, tg.updateUserID, tc.chatroomID
                    from
                    t_member as tm
                    INNER JOIN
                    t_group as tg
                    ON tm.groupID = tg.groupID
                    INNER JOIN
                    t_chatroom tc
                    ON tc.chatroomID = tm.chatroomID
                    where
                    userID =  ? " ;
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

  //メンバーの全てを取得
    public function get_all_member(){
        //SQL文パラメータは?にする
        $query = "select * from t_member";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

  //グループの全てを取得
    public function get_all_group(){
        //SQL文パラメータは?にする
        $query = "select * from t_group";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

  //メンバーのインサート
    public function insert_member() {
        //SQL文パラメータは?にする
        $query = "insert into t_member (memberID, chatroomID, userID, groupID) values
        (?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "memberID",
            "chatroomID",
            "userID",
            "groupID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ssss";
        return $this->return_bind_param($query, $params, $types);
    }

  //グループのインサート
    public function insert_group() {
        //SQL文パラメータは?にする
        $query = "insert into t_group (groupID, groupName, insertDate, updateUserID, workspaceID) values
        (?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID",
            "groupName",
            "insertDate",
            "updateUserID",
            "workspaceID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sssss";
        return $this->return_bind_param($query, $params, $types);
    }

  //アカウントのアップデート文
    public function update_account(){
        //SQL文パラメータは?にする
        $query = "UPDATE m_user SET userName = ?, password = ? where userID = ? ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userName",
            "password",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

  //コメントのインサート
    public function insert_comment() {
        //SQL文パラメータは?にする
        $query = "insert into t_comment (commentID, chatroomID, userID, ord, content, insertDate, updateUserID, updateDate) values
        (?, ?, ?, ?, ?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "commentID",
            "chatroomID",
            "userID",
            "ord",
            "content",
            "insertDate",
            "updateUserID",
            "updateDate"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ssssssss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_all_comment(){
        //SQL文パラメータは?にする
        $query = "select * from t_comment";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

    public function display_comment(){
        //SQL文パラメータは?にする
        $query = "select *
                from
                t_comment
                where
                chatroomID = ?
                and
                delFlg = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "chatroomID",
            "delFlg"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "si";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_groupmember(){
        //SQL文パラメータは?にする
        $query = "SELECT tm.memberID ,tm.chatroomID ,tm.userID ,tm.groupID ,tm.openDate ,mu.userName
                    FROM t_member tm
                    INNER JOIN m_user mu
                    ON tm.userID = mu.userID
                    WHERE groupID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    public function update_useraccount(){
        //SQL文パラメータは?にする
        $query = "UPDATE m_user SET userName = ?, password = ?, messageNtfc = ?, callNtfc = ?, updateUserID = ?, updateDate =? where userID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userName",
            "password",
            "messageNtfc",
            "callNtfc",
            "updateUserID",
            "updateDate",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sssssss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function delete_useraccount(){
        //SQL文パラメータは?にする
        $query = "UPDATE m_user  SET delFlg = ?, updateDate =? where userID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "delFlg",
            "updateDate",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function update_userdelflg(){
        //SQL文パラメータは?にする
        $query = "UPDATE m_user  SET delFlg = ?, updateDate =? where userID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "delFlg",
            "updateDate",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function delete_comment(){
          //SQL文パラメータは?にする
          $query = "UPDATE t_comment SET delFlg = ? where commentID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "delFlg",
              "commentID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "is";

          return $this->return_bind_param($query, $params, $types);
    }

    public function member_userID(){
          //SQL文パラメータは?にする
          $query = "select * from t_member where userID = ? ";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "userID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "s";
          return $this->return_bind_param($query, $params, $types);
    }

    public function group_groupid(){
          //SQL文パラメータは?にする
          $query = "select * from t_member where groupID = ? ";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "groupID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "s";
          return $this->return_bind_param($query, $params, $types);
    }

    //INNER JOINをしてユーザーIDからユーザー名を取得するSQLに変更する。
    public function chatroom_comment(){
          //SQL文パラメータは?にする and  delFlg  = 0
          $query = "select *, null userName from t_comment tc where chatroomID = ? and delFlg = 0 ORDER BY ord";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "chatroomID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "s";
          return $this->return_bind_param($query, $params, $types);
    }

    public function chatroom_comment2(){
            //SQL文パラメータは?にする and  delFlg  = 0
        //   $query = "SELECT tc.*, mu.userName FROM m_user mu INNER join t_comment tc ON mu.userID = tc.userID where tc.chatroomID = ? ORDER BY ord";
        $query = "SELECT tc.*, null as fileName, null as fileData, mu.userName FROM m_user mu INNER join t_comment tc ON mu.userID = tc.userID where tc.chatroomID = ? AND tc.delFlg = 0
        UNION
        SELECT fileID as commentID, chatroomID, tf.userID, ord, null as content, 0 as delFlg, 0 as readFlg, 0 as editFlg, tf.insertDate, tf.updateDate, tf.updateUserID, fileName, fileData, mu.userName from
        t_file tf INNER JOIN m_user mu ON mu.userID = tf.userID where tf.chatroomID = ? AND tf.delFlg = 0
        order by ord";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "chatroomID",
                "chatroomID"
            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "ss";
            return $this->return_bind_param($query, $params, $types);
    }

    public function update_comment(){
          //SQL文パラメータは?にする
          $query = "UPDATE t_comment SET content  = ?, updateDate = ?, editFlg = 1 where commentID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "content",
              "updateDate",
              "commentID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "sss";
          return $this->return_bind_param($query, $params, $types);
    }

    public function chatroomdisplay_member(){
          //SQL文パラメータは?にする
          $query = "insert into t_member (memberID, chatroomID, userID) values (?, ?, ?)";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "memberID",
              "chatroomID",
              "userID"

          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "sss";
          return $this->return_bind_param($query, $params, $types);
    }

    public function chatroomdisplay_chatroom(){
          //SQL文パラメータは?にする
          $query = "insert into t_chatroom (chatroomID, insertDate, updateUserID) values (?, ?, ?)";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "chatroomID",
              "insertDate",
              "updateUserID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "sss";
          return $this->return_bind_param($query, $params, $types);
    }

    public function groupadddisplay_chatroom(){
        //SQL文パラメータは?にする
        $query = "insert into t_chatroom (chatroomID, insertDate, updateUserID) values (?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "chatroomID",
            "insertDate",
            "updateUserID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_all_chatroom(){
        //SQL文パラメータは?にする
        $query = "select * from t_chatroom";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_select_chatroom(){
        //SQL文パラメータは?にする
        $query = "select *, COUNT(*) cnt from t_member where userID in (?, ?)  and groupID Is NULL  group by chatroomID HAVING cnt >= 2";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID1",
            "userID2"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_chatroom(){
        //SQL文パラメータは?にする
        $query = "select * from t_member where userID in (?, ?) group by chatroomID";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID1",
            "userID2"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function innerjoin_group(){
        //SQL文パラメータは?にする
        $query = "select userID , delFlg , userName ,(select tm.chatroomID from t_member tm inner join t_group tg on tg.groupID = tm.groupID where tm.groupID = ? group by tm.chatroomID) chatroomID from m_user mu where userID not in (
            select tm.userID from t_member tm inner join t_group tg on tg.groupID = tm.groupID where tm.groupID = ?
          )";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID",
            "groupID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_group_member(){
        //SQL文パラメータは?にする
        $query = "select mu.* from m_user mu inner join t_member tm on tm.userID = mu.userID where tm.groupID = ? and mu.userID != ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function update_groupdetail(){
          //SQL文パラメータは?にする
          $query = "UPDATE t_group SET groupName = ?, updateDate = ?, updateUserID = ? where groupID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "groupName",
              "updateDate",
              "updateUserID",
              "groupID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "ssss";
          return $this->return_bind_param($query, $params, $types);
    }

    public function delete_groupdetail(){
          //SQL文パラメータは?にする
          $query = "DELETE FROM t_member WHERE userID  = ? and groupID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "userID",
              "groupID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "ss";
          return $this->return_bind_param($query, $params, $types);
    }

    public function select_groupmember(){
          //SQL文パラメータは?にする
          $query = "select * from t_member where groupID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "groupID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "s";
          return $this->return_bind_param($query, $params, $types);
    }

    public function update_grouptable(){
          //SQL文パラメータは?にする
          $query = "UPDATE t_group SET delFlg = 1 where groupID = ?";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "groupID"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "s";
          return $this->return_bind_param($query, $params, $types);
    }

    public function select_maxmemberid(){
          //SQL文パラメータは?にする
          $query = "select memberID from (
                    select substring(memberID, 3) memberID from t_member where memberID like 'GM%'
                    ) as tm
                    order by lpad(memberID, 10, '0') desc limit 1";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
            ""
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "";
          return $this->return_bind_param($query, $params, $types);
    }

    public function update_comment_read(){
        //SQL文パラメータは?にする
        $query = "update t_comment set readFlg = 1 where userID != ? and chatroomID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "chatroomID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function update_member_open_date(){
        //SQL文パラメータは?にする
        $query = "update t_member set openDate = ?  where userID = ? and chatroomID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "openDate",
            "userID",
            "chatroomID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_member_comment_read(){
        //SQL文パラメータは?にする
        $query = "select tm1.chatroomID, tm1.userID, ifnull(tc1.unreadCnt, 0) unreadCnt from t_member tm1
            inner join (select * from t_member tm where tm.userID = ?) tm2 on tm2.chatroomID = tm1.chatroomID
            left join (select chatroomID, count(*) unreadCnt from t_comment tc where userID != ? and readFlg = 0 and delFlg != 1 group by chatroomID) tc1 on tc1.chatroomID = tm1.chatroomID
            where tm1.groupID Is NULL and tm1.userID != ? group by tm1.chatroomID";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "userID",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function get_group_comment_read(){
        //SQL文パラメータは?にする
        $query = "select tm1.chatroomID, tm1.groupID, tc1.cnt unreadCnt from t_member tm1
            inner join (select tc.chatroomID, count(*) cnt from t_comment tc inner join (select * from t_member tm where tm.userID = ?) tm3 on tm3.chatroomID = tc.chatroomID
            where tc.userID != ? and tc.delFlg != 1 and (tc.insertDate > tm3.openDate or tm3.openDate is null) group by tc.chatroomID) tc1 on tc1.chatroomID = tm1.chatroomID
            where tm1.groupID Is Not NULL and tm1.userID != ? group by tm1.chatroomID ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "userID",
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    public function select_errorlog(){
          //SQL文パラメータは?にする
          $query = "select * from t_log";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              ""
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "";
          return $this->return_bind_param($query, $params, $types);
    }

    public function insert_log(){
          //SQL文パラメータは?にする
          $query = "insert into t_log (logLebel, content, userID, insertDate) values (?, ?, ?, ?)";
          //パラメータ名を$queryの?の順番に文字列として配列に入れる
          $params = [
              "logLebel",
              "content",
              "userID",
              "insertDate"
          ];
          //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
          $types = "ssss";
          return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースを作成する際に使用するインサート
    public function insert_workspace() {
        //SQL文パラメータは?にする
        $query = "insert into t_workspace (workspaceID, workspaceName, insertDate, updateDate, updateUserID) values
         (?, ?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "workspaceID",
            "workspaceName",
            "insertDate",
            "updateDate",
            "updateUserID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sssss";
        return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースの検索用
    public function search_workspace(){
        //SQL文パラメータは?にする
        $query = "select * from t_workspace where workspaceID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "workspaceID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースのを全て取得
    public function all_search_workspace(){
        //SQL文パラメータは?にする
        $query = "select * from t_workspace ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }
    
  //所属テーブルの検索用
    public function search_affiliation(){
      //SQL文パラメータは?にする
      $query = "select * from t_affiliation where affiliationID = ?";
      //パラメータ名を$queryの?の順番に文字列として配列に入れる
      $params = [
          ""
      ];
      //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
      $types = "";
      return $this->return_bind_param($query, $params, $types);
    }

  //全ての所属テーブル情報を取得
    public function all_search_affiliation(){
        //SQL文パラメータは?にする
        $query = "select * from t_affiliation ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            ""
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースに所属するメンバーを取得する
    public function get_workspace_member(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    mu.userID ,mu.userName ,mu.userImage ,mu.delFlg ,mu.insertDate ,mu.updateDate ,mu.updateUserID ,ta.affiliationID ,ta.workspaceID ,ta.adminFlg ,ta.approvalFlg ,tw.workspaceName
                    , m2.memberID, m2.chatroomID
                    FROM
                    t_affiliation ta
                    JOIN
                    t_workspace tw
                    ON
                    ta.workspaceID = tw.workspaceID
                    JOIN
                    m_user mu
                    ON
                    ta.userID = mu.userID
                    JOIN (
                    select mu.*, mm.memberID, mm.chatroomID, mm.groupID from m_user mu left join (
                    select tm.* from t_member tm inner join (
                    select * from t_member tm where tm.userID = ? group by tm.chatroomID
                    ) tm2 on tm2.chatroomID = tm.chatroomID where tm.userID <> ? and tm.groupID is NULL
                    ) mm on mm.userID = mu.userID
                    ) m2 on m2.userID = ta.userID
                    WHERE
                    ta.workspaceID = ?";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "userID",
            "workspaceID"          
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースに所属するメンバーを取得する(昇順)
    public function member_asc_sort(){
        //SQL文パラメータは?にする
        $query = "SELECT
                mu.userID ,mu.userName ,mu.userImage ,mu.delFlg ,mu.insertDate ,mu.updateDate ,mu.updateUserID ,ta.affiliationID ,ta.workspaceID ,ta.adminFlg ,ta.approvalFlg ,tw.workspaceName
                , m2.memberID, m2.chatroomID
                FROM
                t_affiliation ta
                JOIN
                t_workspace tw
                ON
                ta.workspaceID = tw.workspaceID
                JOIN
                m_user mu
                ON
                ta.userID = mu.userID
                JOIN (
                select mu.*, mm.memberID, mm.chatroomID, mm.groupID from m_user mu left join (
                select tm.* from t_member tm inner join (
                select * from t_member tm where tm.userID = ? group by tm.chatroomID
                ) tm2 on tm2.chatroomID = tm.chatroomID where tm.userID <> ? and tm.groupID is NULL
                ) mm on mm.userID = mu.userID
                ) m2 on m2.userID = ta.userID
                WHERE
                ta.workspaceID = ?
                ORDER BY userName ASC";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
        "userID",
        "userID",
        "workspaceID"       
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

//ワークスペースに所属するメンバーを取得する(降順)
    public function member_desc_sort(){
        //SQL文パラメータは?にする
        $query = "SELECT
                mu.userID ,mu.userName ,mu.userImage ,mu.delFlg ,mu.insertDate ,mu.updateDate ,mu.updateUserID ,ta.affiliationID ,ta.workspaceID ,ta.adminFlg ,ta.approvalFlg ,tw.workspaceName
                , m2.memberID, m2.chatroomID
                FROM
                t_affiliation ta
                JOIN
                t_workspace tw
                ON
                ta.workspaceID = tw.workspaceID
                JOIN
                m_user mu
                ON
                ta.userID = mu.userID
                JOIN (
                select mu.*, mm.memberID, mm.chatroomID, mm.groupID from m_user mu left join (
                select tm.* from t_member tm inner join (
                select * from t_member tm where tm.userID = ? group by tm.chatroomID
                ) tm2 on tm2.chatroomID = tm.chatroomID where tm.userID <> ? and tm.groupID is NULL
                ) mm on mm.userID = mu.userID
                ) m2 on m2.userID = ta.userID
                WHERE
                ta.workspaceID = ?
                ORDER BY userName DESC";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
        "userID",
        "userID",
        "workspaceID"       
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースに所属するメンバーを取得する(新着順)
    public function member_new_order_sort(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    mu.userID ,mu.userName ,mu.userImage ,mu.delFlg ,mu.insertDate ,mu.updateDate ,mu.updateUserID ,ta.affiliationID ,ta.workspaceID ,ta.adminFlg ,ta.approvalFlg ,tw.workspaceName
                    , m2.memberID, m2.chatroomID, tc.insertDate
                    FROM
                    t_affiliation ta
                    JOIN
                    t_workspace tw
                    ON
                    ta.workspaceID = tw.workspaceID
                    JOIN
                    m_user mu
                    ON
                    ta.userID = mu.userID
                    JOIN (
                    select mu.*, mm.memberID, mm.chatroomID, mm.groupID from m_user mu left join (
                    select tm.* from t_member tm inner join (
                    select * from t_member tm where tm.userID = ? group by tm.chatroomID
                    ) tm2 on tm2.chatroomID = tm.chatroomID where tm.userID <> ? and tm.groupID is NULL
                    ) mm on mm.userID = mu.userID
                    ) m2 on m2.userID = ta.userID
                    LEFT JOIN(SELECT chatroomID, MAX(insertDate) insertDate FROM t_comment GROUP BY chatroomID) tc ON tc.chatroomID = m2.chatroomID
                    WHERE
                    ta.workspaceID = ?
                    GROUP BY mu.userID
                    ORDER BY tc.insertDate DESC";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
        "userID",
        "userID",
        "workspaceID"       
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースに新しいメンバーを追加する
    public function insert_affiliation() {
            //SQL文パラメータは?にする
            $query = "insert into t_affiliation (affiliationID, workspaceID, userID, adminFlg, insertDate, updateDate, updateUserID) values
            (?, ?, ?, ?, ?, ?, ?)";
            //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "affiliationID",
                "workspaceID",
                "userID",
                "adminFlg",
                "insertDate",
                "updateDate",
                "updateUserID"

            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "sssssss";
            return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースの編集用（ワークスペースの名称変更）
    public function update_workspace(){
            //SQL文パラメータは?にする
            $query = "UPDATE  t_workspace SET workspaceName = ?, updateDate = ?, updateUserID = ? WHERE workspaceID = ?";
            //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "workspaceName",
                "updateDate",
                "updateUserID",
                "workspaceID"
            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "ssss";
            return $this->return_bind_param($query, $params, $types);
    }

  //自分の所属するワークスペースの取得
    public function search_my_workspace(){
            //SQL文パラメータは?にする
            $query = "SELECT ta.affiliationID ,ta.workspaceID ,ta.userID ,ta.adminFlg ,ta.insertDate ,ta.updateDate ,ta.updateUserID ,ta.approvalFlg ,tw.workspaceName
                    FROM t_affiliation ta
                    INNER JOIN t_workspace tw
                    ON ta.workspaceID = tw.workspaceID
                    WHERE ta.userID = ?
                    AND ta.approvalFlg = 0
                    GROUP BY ta.workspaceID ";
            //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "userID"
            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "s";
            return $this->return_bind_param($query, $params, $types);
    }

  //ワークスペースからメンバーを削除する
    public function delete_workspace_member(){
            //SQL文パラメータは?にする
            $query = "DELETE
                    FROM t_affiliation
                    WHERE workspaceID = ?
                    AND userID = ? ";
            //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "workspaceID",
                "userID"
            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "ss";
            return $this->return_bind_param($query, $params, $types);
    }

    public function get_files_from_chatroom(){
        //SQL文パラメータは?にする
        $query = "select * from t_file where chatroomID = ? and delFlg <> 1";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "chatroomID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

  //承認待ちのメンバーを取得する。
    public function Member_pending_approval(){
    //SQL文パラメータは?にする
    $query = "SELECT ta.workspaceID ,ta.userID ,ta.approvalFlg ,mu.userName
                FROM t_affiliation ta
                INNER JOIN m_user mu
                ON ta.userID = mu.userID
                WHERE ta.approvalFlg = ?";
    //パラメータ名を$queryの?の順番に文字列として配列に入れる
    $params = [
        "approvalFlg"
    ];
    //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
    $types = "s";
    return $this->return_bind_param($query, $params, $types);
    }

  //すべてのコメントとファイル数
    public function get_comment_file_count(){
        //SQL文パラメータは?にする
        $query = "SELECT * FROM
            (SELECT COUNT(*) comment FROM t_comment tc) cnt,
            (SELECT COUNT(*) file FROM t_file) cnt2";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "";
        return $this->return_bind_param($query, $params, $types);
    }

   //承認待ちユーザーの許可・不許可
    public function approval_permission(){
        //SQL文パラメータは?にする
        $query = "UPDATE t_affiliation SET approvalFlg = ? WHERE userID = ? AND workspaceID = ?;";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "approvalFlg",
            "userID",
            "workspaceID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sss";
        return $this->return_bind_param($query, $params, $types);
    }

  //メンバーの権限変更
    public function change_permissions(){
    //SQL文パラメータは?にする
    $query = "UPDATE t_affiliation SET adminFlg = ?, updateDate = ?, updateUserID = ? WHERE workspaceID = ? AND userID = ?";
    //パラメータ名を$queryの?の順番に文字列として配列に入れる
    $params = [
        "adminFlg",
        "updateDate",
        "updateUserID",
        "workspaceID",
        "userID"
    ];
    //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
    $types = "sssss";
    return $this->return_bind_param($query, $params, $types);
    }

   //ユーザーがワークスぺースに参加申請を出す際にワークスペースを検索する
    public function Apply_workspace(){
            //SQL文パラメータは?にする
            $query = "select tw2.workspaceID, tw2.workspaceName, ta2.userID, ta2.affiliationID, ta2.adminFlg, ta2.insertDate, ta2.updateDate, ta2.updateUserID, ta2.approvalFlg from t_workspace tw2 left join (
                select ta.* from t_workspace tw left join t_affiliation ta on ta.workspaceID = tw.workspaceID where ta.userID = ?
                ) ta2 on ta2.workspaceID = tw2.workspaceID";
            //パラメータ名を$queryの?の順番に文字列として配列に入れる
            $params = [
                "userID"
            ];
            //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
            $types = "s";
            return $this->return_bind_param($query, $params, $types);
    }

   //ワークスペースに新しいメンバーを追加する
    public function insert_ApplyWorkspace() {
    //SQL文パラメータは?にする
    $query = "insert into t_affiliation (affiliationID, workspaceID, userID, adminFlg, insertDate, updateDate, updateUserID, approvalFlg) values
    (?, ?, ?, ?, ?, ?, ?, ?)";
    //パラメータ名を$queryの?の順番に文字列として配列に入れる
    $params = [
        "affiliationID",
        "workspaceID",
        "userID",
        "adminFlg",
        "insertDate",
        "updateDate",
        "updateUserID",
        "approvalFlg"
    ];
    //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
    $types = "ssssssss";
    return $this->return_bind_param($query, $params, $types);
    }

  //申請中のワークスペースを取得
    public function waiting_result(){
        //SQL文パラメータは?にする
        $query = "SELECT ta.affiliationID ,ta.workspaceID ,ta.userID ,ta.adminFlg ,ta.insertDate ,ta.updateDate ,ta.updateUserID ,ta.approvalFlg ,tw.workspaceName
                    FROM t_affiliation ta
                    INNER JOIN t_workspace tw
                    ON ta.workspaceID = tw.workspaceID
                    WHERE ta.userID = ?
                    AND ta.approvalFlg = 1
                    GROUP BY ta.workspaceID";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースに追加されたグループを取得
    public function catch_all_groups(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    tg.groupID ,tg.groupName ,tg.groupImage ,tg.delFlg ,tg.insertDate ,tg.updateDate ,tg.updateUserID ,tg.workspaceID ,tm.chatroomID
                    FROM
                    t_group tg
                    JOIN
                    t_workspace tw
                    ON
                    tg.workspaceID = tw.workspaceID
                    JOIN
                    t_member tm
                    ON
                    tg.groupID = tm.groupID
                    WHERE
                    tm.userID = ?
                    AND
                    tg.workspaceID = ?
                    GROUP BY tg.groupName";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID",
            "workspaceID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースに追加されたグループを取得(昇順)
    public function catch_asc_groups(){
        //SQL文パラメータは?にする
        $query = "SELECT
        tg.groupID ,tg.groupName ,tg.groupImage ,tg.delFlg ,tg.insertDate ,tg.updateDate ,tg.updateUserID ,tg.workspaceID ,tm.chatroomID
        FROM
        t_group tg
        JOIN
        t_workspace tw
        ON
        tg.workspaceID = tw.workspaceID
        JOIN
        t_member tm
        ON
        tg.groupID = tm.groupID
        WHERE
        tm.userID = ?
        ORDER BY tg.groupName ASC ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースに追加されたグループを取得(降順)
    public function catch_desc_groups(){
        //SQL文パラメータは?にする
        $query = "SELECT
        tg.groupID ,tg.groupName ,tg.groupImage ,tg.delFlg ,tg.insertDate ,tg.updateDate ,tg.updateUserID ,tg.workspaceID ,tm.chatroomID
        FROM
        t_group tg
        JOIN
        t_workspace tw
        ON
        tg.workspaceID = tw.workspaceID
        JOIN
        t_member tm
        ON
        tg.groupID = tm.groupID
        WHERE
        tm.userID = ?
        ORDER BY tg.groupName DESC ";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //ワークスペースに追加されたグループを取得(新着順)
    public function catch_new_order_groups(){
        //SQL文パラメータは?にする
        $query = "SELECT tg.groupID ,tg.groupName ,tg.groupImage ,tg.delFlg ,tg.insertDate ,tg.updateDate ,tg.updateUserID ,tg.workspaceID ,tm.chatroomID, MAX(tc.insertDate) as maxInsertDate
                    FROM t_group tg
                    INNER JOIN t_workspace tw
                    ON tg.workspaceID = tw.workspaceID
                    INNER JOIN t_member tm
                    ON tg.groupID = tm.groupID
                    LEFT JOIN(SELECT chatroomID, MAX(insertDate) insertDate FROM t_comment GROUP BY chatroomID) tc ON tc.chatroomID = tm.chatroomID
                    WHERE tm.userID = ?
                    GROUP BY tg.groupID
                    ORDER BY tc.insertDate DESC";
                    //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //グループに所属するメンバーを取得する
    public function all_get_gtoupmember(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    tm.memberID ,tm.chatroomID ,tm .userID ,tm .groupID ,tm.openDate ,mu.userName
                    FROM
                    t_member tm
                    join
                    m_user mu
                    ON
                    tm.userID = mu.userID
                    WHERE
                    tm.groupID = ?
                    GROUP BY tm.userID";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //グループを作成する
    public function get_insert_group(){
        //SQL文パラメータは?にする
        $query = "insert into t_group (groupID, groupName, insertDate, updateUserID, workspaceID) values
        (?, ?, ?, ?, ?)";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "groupID",
            "groupName",
            "insertDate",
            "updateUserID",
            "workspaceID",
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "sssss";
        return $this->return_bind_param($query, $params, $types);
    }











    //Web版

    //ログインユーザーが所属するワークスペース
    public function web_my_workspace(){
        //SQL文パラメータは?にする
        $query = "SELECT ta.workspaceID ,tw.workspaceName 
                FROM t_affiliation ta 
                INNER JOIN t_workspace tw  
                ON ta.workspaceID = tw.workspaceID 
                WHERE userID = ?
                AND ta.approvalFlg =0";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
    }

    //Web:ワークスペースに所属するmember
    public function web_get_workspace_member(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    mu.userID ,mu.userName ,mu.userImage ,mu.delFlg ,mu.insertDate ,mu.updateDate ,mu.updateUserID ,ta.affiliationID ,ta.workspaceID ,ta.adminFlg ,ta.approvalFlg ,tw.workspaceName
                    , m2.memberID, m2.chatroomID
                    FROM
                    t_affiliation ta
                    JOIN
                    t_workspace tw
                    ON
                    ta.workspaceID = tw.workspaceID
                    JOIN
                    m_user mu
                    ON
                    ta.userID = mu.userID
                    JOIN (
                    select mu.*, mm.memberID, mm.chatroomID, mm.groupID from m_user mu left join (
                    select tm.* from t_member tm inner join (
                    select * from t_member tm where tm.userID = ? group by tm.chatroomID
                    ) tm2 on tm2.chatroomID = tm.chatroomID where tm.userID <> ? and tm.groupID is NULL
                    ) mm on mm.userID = mu.userID
                    ) m2 on m2.userID = ta.userID";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
          "userID",
          "userID"   
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "ss";
        return $this->return_bind_param($query, $params, $types);
    }

      //Web:ワークスペースに所属するgroup
      public function web_catch_all_groups(){
        //SQL文パラメータは?にする
        $query = "SELECT
                    tg.groupID ,tg.groupName ,tg.delFlg ,tg.insertDate ,tg.updateDate ,tg.updateUserID ,tg.workspaceID ,tm.chatroomID
                    FROM
                    t_group tg
                    JOIN
                    t_workspace tw
                    ON
                    tg.workspaceID = tw.workspaceID
                    JOIN
                    t_member tm
                    ON
                    tg.groupID = tm.groupID
                    WHERE
                    tm.userID = ?
                    GROUP BY tg.groupName";
        //パラメータ名を$queryの?の順番に文字列として配列に入れる
        $params = [
            "userID"
        ];
        //パラメータの型をSQLの?の順番に指定 s = string, i = integer, d = double, b = blob
        $types = "s";
        return $this->return_bind_param($query, $params, $types);
        }
    

}

class image_sql {
    public function return_bind_param($query, $param){
        $array = [
            'query_array'=>[$query],
            'param_array'=>[$param]
        ];
        return $array;
    }

    public function update_image(){
        //SQL文パラメータは?にする
        $query = "update m_user set userImage = :image where userID = :userID";
        $params = [
            ":userID"
        ];
        return $this->return_bind_param($query, $params);
    }

    public function update_group_image(){
        //SQL文パラメータは?にする
        $query = "update t_group set groupImage = :image where groupID = :groupID";
        $params = [
            ":groupID"
        ];
        return $this->return_bind_param($query, $params);
    }

    public function get_user_image(){
        //SQL文パラメータは?にする
        $query = "select userID, userImage from m_user where userID = :userID";
        $params = [
            ":userID"
        ];
        return $this->return_bind_param($query, $params);
    }

    public function get_user_images(){
        //SQL文パラメータは?にする
        $query = "select userID, userImage from m_user where delFlg = 0 and userImage <> ''";
        $params = [
        ];
        return $this->return_bind_param($query, $params);
    }

    public function insert_file(){
        //SQL文パラメータは?にする
        $query = "insert into t_file (fileID, chatroomID, userID, ord, fileName, fileData, insertDate, updateUserID) values
        (:fileID, :chatroomID, :userID, :ord, :fileName, :image, :insertDate, :updateUserID)";
        $params = [
            ":fileID",
            ":chatroomID",
            ":userID",
            ":ord",
            ":fileName",
            ":insertDate",
            ":updateUserID"
        ];
        return $this->return_bind_param($query, $params);
    }
}
