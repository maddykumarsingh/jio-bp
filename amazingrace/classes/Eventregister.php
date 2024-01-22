<?php

// session_start();
class Eventregister
{
      public function getLeaderBoard($connPdo) {
        $query = "SELECT t2.emp_name as name1,t2.emp_code as Emp_Id,t2.emp_email as email,t1.`points` as points,t1.`total_time` as time FROM stat t1 LEFT JOIN employeemaster_navrang t2 ON t1.userid= t2.id where t1.`total_time`!='NULL' order by points desc,time asc limit 10";
        $res = $connPdo->query($query);
        $result = $res->fetchAll();
       return $result;
    }
    public function checkgamecountprogress($connPdo, $objpdoClass)
    {
        $sql = "SELECT COUNT(*) AS 'Count' FROM user_question_answers WHERE  userid = '" . $_SESSION['userid'] . "'   ";
        $res2 = $connPdo->query($sql);
        $gameprogress = $res2->fetchAll(PDO::FETCH_ASSOC);
        $precentage = ((int)$gameprogress[0]['Count']) * 100 / 35;

        $totalpercentage = ceil($precentage);
//        echo "<pre>";print_r($totalpercentage);die;
        return $totalpercentage;
    }

    public function getQuestionDetails($userid, $post, $connPdo, $objpdoClass)
    {
        $sql = "SELECT * FROM user_question_answers WHERE userid = '" . $userid . "' AND div_id = '" . $post['addedValue'] . "' ";
        $res2 = $connPdo->query($sql);
        $playerscore = $res2->fetchAll(PDO::FETCH_ASSOC);

        if (count($playerscore) == 1) {
            if ($post['addedValue'] != '7' && $post['addedValue'] != '13' && $post['addedValue'] != '19') {
                return "question played";
            }
        } else if (count($playerscore) == 5) {
            return "peril played";
        }

        if ($post['addedValue'] == '7' || $post['addedValue'] == '13' || $post['addedValue'] == '19') {

            $sqlquery = "SELECT div_id, is_image FROM user_question_answers WHERE userid = '" . $userid . "' AND div_id = '" . $post['addedValue'] . "' ";
            $resquery = $connPdo->query($sqlquery);
            $image_check = $resquery->fetchAll(PDO::FETCH_ASSOC);

            $query2 = "SELECT id,div_id,image_url,question_type,type FROM questions_master WHERE div_id='" . $post['addedValue'] . "'";
            $res2 = $connPdo->query($query2);
            $result2 = $res2->fetchAll(PDO::FETCH_ASSOC);
            if (count($image_check) == 0) {
                $data['question_image_1'] = array('id' => $result2[0]['id'], 'div_id' => $result2[0]['div_id'], 'image_url' => $result2[0]['image_url'], 'question_type' => $result2[0]['question_type'], 'type' => $result2[0]['type']);
            } elseif (count($image_check) == 1) {
                $data['question_image_2'] = array('id' => $result2[1]['id'], 'div_id' => $result2[1]['div_id'], 'image_url' => $result2[1]['image_url'], 'question_type' => $result2[1]['question_type'], 'type' => $result2[1]['type']);
            } elseif (count($image_check) == 2) {
                $data['question_image_3'] = array('id' => $result2[2]['id'], 'div_id' => $result2[2]['div_id'], 'image_url' => $result2[2]['image_url'], 'question_type' => $result2[2]['question_type'], 'type' => $result2[2]['type']);
            } elseif (count($image_check) == 3) {
                $data['question_image_4'] = array('id' => $result2[3]['id'], 'div_id' => $result2[3]['div_id'], 'image_url' => $result2[3]['image_url'], 'question_type' => $result2[3]['question_type'], 'type' => $result2[3]['type']);
            } elseif (count($image_check) == 4) {
                $data['question_image_5'] = array('id' => $result2[4]['id'], 'div_id' => $result2[4]['div_id'], 'image_url' => $result2[4]['image_url'], 'question_type' => $result2[4]['question_type'], 'type' => $result2[4]['type']);
            } else {
                return "played";
            }

        } else {
            $query = "SELECT id,questions,option_1,option_2,div_id,question_type,type from questions_master WHERE div_id='" . $post['addedValue'] . "'";
            $res = $connPdo->query($query);
            $result = $res->fetchAll(PDO::FETCH_ASSOC);
            $data['questions'] = array('id' => $result[0]['id'], 'question' => $result[0]['questions'], 'option_1' => $result[0]['option_1'], 'option_2' => $result[0]['option_2'], 'div_id' => $result[0]['div_id'], 'question_type' => $result[0]['question_type'], 'type' => $result[0]['type']);
        }
        return $data;

    }

    public function setAnswer($post, $connPdo, $objpdoClass)
    {
        // print_r($post);
        $answer = strtolower(preg_replace('/\s/', '', $post['answer']));
        $question_id = $post['questionid'];
        $sql1 = "SELECT answer FROM answer_master WHERE div_id = '" . $post['div_id'] . "' AND question_id = '" . $post['questionid'] . "' ";
        $res = $connPdo->query($sql1);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        if (($result[0]['answer'] == $answer)) {

            if ($post['div_id'] == '7' || $post['div_id'] == '13' || $post['div_id'] == '19') {
                $sql6 = "INSERT INTO `user_question_answers`(`userid`, `questionid`, `div_id`, `answer`, `is_answer_correct`, `is_visited`, `is_game_completed`,`is_image`,`score`, `created_at`) VALUES ('" . $_SESSION['userid'] . "','" . $question_id . "','" . $post['div_id'] . "','" . $answer . "','1','1','1','1','50','" . date('Y-m-d H:i:s') . "')";
                $connPdo->query($sql6);
                return "correct";
            } else {
                $sql6 = "INSERT INTO `user_question_answers`(`userid`, `questionid`, `div_id`, `answer`, `is_answer_correct`, `is_visited`, `is_game_completed`,`is_image`,`score`, `created_at`) VALUES ('" . $_SESSION['userid'] . "','" . $question_id . "','" . $post['div_id'] . "','" . $answer . "','1','1','1','0','50','" . date('Y-m-d H:i:s') . "')";
                $connPdo->query($sql6);
                return "correct";

            }

        } else {
            if ($post['div_id'] == '7' || $post['div_id'] == '13' || $post['div_id'] == '19') {
                $sql7 = "INSERT INTO `user_question_answers`(`userid`, `questionid`, `div_id`, `answer`, `is_answer_correct`, `is_visited`, `is_game_completed`,`is_image`,`score`, `created_at`) VALUES ('" . $_SESSION['userid'] . "','" . $question_id . "','" . $post['div_id'] . "','" . $answer . "','0','1','1','1','-50','" . date('Y-m-d H:i:s') . "')";
                $connPdo->query($sql7);
                return "incorrect";
            } else {
                $sql7 = "INSERT INTO `user_question_answers`(`userid`, `questionid`, `div_id`, `answer`, `is_answer_correct`, `is_visited`, `is_game_completed`,`is_image`,`score`, `created_at`) VALUES ('" . $_SESSION['userid'] . "','" . $question_id . "','" . $post['div_id'] . "','" . $answer . "','0','1','1','0','-50','" . date('Y-m-d H:i:s') . "')";
                $connPdo->query($sql7);
                return "incorrect";
            }

        }
    }

    public function checkIfGameCompleted($connPdo, $objpdoClass)
    {
        $sql = "SELECT * FROM user_question_answers WHERE userid = '" . $_SESSION['userid'] . "'";
        $res1 = $connPdo->query($sql);
        $result1 = $res1->fetchAll();
        if (count($result1) == 35) {
            return 'already_played';
        } else {
            return 'Not Played';
        }
    }

    public function checkRoundScore($connPdo, $objpdoClass)
    {
        $query = "SELECT * FROM user_round_score WHERE userid = '" . $_SESSION['userid'] . "'";
        $res = $connPdo->query($query);
        $result = $res->fetchAll();
        if (count($result) > 0) {
            $query = "UPDATE user_round_score SET round_score = (round_score + 100) WHERE userid = '" . $_SESSION['userid'] . "'";
            $connPdo->query($query);
        } else {
            $sql = "INSERT INTO `user_round_score`(`userid`, `round_score`) VALUES ('" . $_SESSION['userid'] . "','100')";
            $connPdo->query($sql);
        }
    }

    public function getPlayerScore($userid, $connPdo, $objpdoClass)
    {
        $sql = "SELECT * FROM user_question_answers WHERE userid = '" . $userid . "'";
        $res1 = $connPdo->query($sql);
        $result1 = $res1->fetchAll();

        $sql1 = "SELECT SUM(score) AS score FROM user_question_answers WHERE userid = '" . $userid . "'";
        $res2 = $connPdo->query($sql1);
        $result2 = $res2->fetchAll();
        $sql2 = "SELECT SUM(round_score) AS round_score FROM user_round_score WHERE userid = '" . $userid . "'";
        $res3 = $connPdo->query($sql2);
        $result3 = $res3->fetchAll();
        $score = (int)$result3[0]['round_score'] + (int)$result2[0]['score'];
        if (count($result1) == 35) {
            $sql = "SELECT SUM(score) AS score FROM user_question_answers WHERE userid = '" . $userid . "'";
            $res1 = $connPdo->query($sql);
            $result1 = $res1->fetchAll();

            $query = "UPDATE users SET total_score = '" . $score . "', is_completed = 1 WHERE id = '" . $userid . "'";
            $connPdo->query($query);
            return 'game_completed';
        } else if ($score >= '1000') {
            $sql = "SELECT SUM(score) AS score FROM user_question_answers WHERE userid = '" . $userid . "'";
            $res1 = $connPdo->query($sql);
            $result1 = $res1->fetchAll();

            $query = "UPDATE users SET total_score = '" . $score . "', is_completed = 1 WHERE id = '" . $userid . "'";
            $connPdo->query($query);
            return "game_completed_after_1000_points";
        }

        if ($result3[0]['round_score'] != '') {
            $score = (int)$result3[0]['round_score'] + (int)$result2[0]['score'];
            return $score;
        } elseif ($result2[0]['score'] == '') {
            return 0;
        } else {
            $score = (int)$result2[0]['score'];
            return $score;
        }

    }

    public function getRandomFacts($connPdo, $objpdoClass)
    {
        $id = rand(1, 23);
        $sql = "SELECT facts FROM random_facts WHERE id = '" . $id . "' LIMIT 1";
        $res = $connPdo->query($sql);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPlayerPosition($userid, $connPdo, $objpdoClass)
    {
        $sql = "SELECT div_id FROM user_question_answers WHERE userid = '" . $userid . "' ORDER BY id DESC LIMIT 1";

        $res = $connPdo->query($sql);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0]['div_id'];
        } else {
            return "Not Played";
        }
    }

    public function getCertificateScore($connPdo, $objpdoClass)
    {
        $sql1 = "SELECT SUM(score) AS total_score FROM user_question_answers WHERE userid = '" . $_SESSION['userid'] . "'";
        $res2 = $connPdo->query($sql1);
        $result2 = $res2->fetchAll();
        return $result2[0]['total_score'];
    }

}