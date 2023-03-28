<?php
require 'sql.php';
require 'sql_settings.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$result = array();;
try {

  $mysql = new mysqli($hostname, $username, $password, $database);
  if ($mysql->connect_error) {
    die('接続失敗です。'.mysql_error());
    exit();
  } else {
    $mysql->set_charset("utf8");
  }
  
  $mysql->autocommit(false);

  $query_count = 0;
  while (true) {
    $query_name = "query_name" .$query_count;
    if (!isset($_POST[$query_name])) {
      break;
    }
    $query_count++;
    
    $sql = $_POST[$query_name];
    // $sql = "get_user";
    $get_sql = new get_sql;
    $res_array = $get_sql->$sql();
    // $query = "select * from m_user mu";
    // $result = mysqli_query($mysql, $res_array["query_array"][0]);
    $stmt = $mysql->prepare($res_array["query_array"][0]);

    // $user = $_POST['param'];
    $args = array();

    if ($res_array["type_array"][0] <> "") {
      $args[] = $res_array['type_array'][0];
      foreach ($res_array["param_array"][0] as $key => $value) {
        $args[] = $_POST[$value];
      }
      $stmt->bind_param(...$args);
    }

    // if ($res_array["type_array"][0] <> "") {
    //     foreach ($res_array["type_array"] as $res) {
    //         $stmt->bind_param($res, $user);
    //     }
    // }

    $stmt->execute();
    $meta = $stmt->result_metadata();
    // $stmt->bind_result($district);
    $row_array = array();
    
    //SELECT文の場合は取得した値を変数に入れる
    if(strcasecmp(substr($res_array['query_array'][0], 0, 6), "SELECT") == 0 || 
    strcasecmp(substr($res_array['query_array'][0], 0, 6), "select") == 0) {


      //+++++++++テーブルのフィールド情報を取得+++++++++++++
      $finfo = $meta->fetch_fields();
      $fields = array();
      $field_index = 0;
      foreach ($finfo as $val) {
          $fields[$field_index]["Name"] = $val->name;
          $fields[$field_index]["Type"] = $val->type;
          $params[] = &$row[$val->name];
          $field_index++;
      }
      //+++++++++++++++++++++++++++++++++++++++++++++++++++

      call_user_func_array(array($stmt, 'bind_result'), $params);

      while ($stmt->fetch()) {
          foreach($row as $key => $val)
          {
              $c[$key] = $val;
          }
          $result[] = $c;
      }
      $params = array();
    }
  }
  //++++++++型、値を配列に入れる++++++++
  // $index = 0;
  // $field_index = 0;
  // while ($data = $stmt->fetch()) {
  //     $field_index = 0;
  //     for ($i = 0; $i < count($fields); $i++) {
  //         $row_array[$index][$fields[$field_index]["Name"]]["Value"] = $data[$i];
  //         $row_array[$index][$fields[$field_index]["Name"]]["Type"] = $fields[$field_index]["Type"];
  //         $field_index++;
  //     }
      
  //     $index++;
  // }
  //+++++++++++++++++++++++++++

  // $finfo = $result->fetch_fields();
  // foreach ($finfo as $val) {
  //     for ($i = 0; $i < count($data); $i++) {
  //         $row_array[$index][$i] = [$data[$i]];
  //     }
  //     $index++;
  //     printf("Name:      %s\n",   $val->name);
  //     printf("Table:     %s\n",   $val->table);
  //     printf("Max. Len:  %d\n",   $val->max_length);
  //     printf("Length:    %d\n",   $val->length);
  //     printf("charsetnr: %d\n",   $val->charsetnr);
  //     printf("Flags:     %d\n",   $val->flags);
  //     printf("Type:      %d\n\n", $val->type);
  // }
  
} catch (mysqli_sql_exception $e) {
  $mysql->rollback();
  $result[] .= $e->getMessage();
} finally {
  // error_log("正常終了", 3, "./debug.log");
  $mysql->commit();
  $stmt->close();
  $mysql->close();
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); //JSON形式にして返す
}


?>