<?php

namespace App\Vote\Vote;

use Core\Config;

class vote {

    public $ref;
    private $pdo;
    private $former_vote;

    public function __construct (){
        $config = Config::getInstance(ROOT.'/config/config.php');
        $this->pdo = new \PDO('mysql:dbname='.$config->get('db_name').';host='.$config->get('db_host').'', ''.$config->get('db_user').'',''.$config->get('db_pass').'');
    }

    private function recordExists($ref, $ref_id){
        $req = $this->pdo->prepare("SELECT * FROM $ref WHERE id = ?");
        $req->execute([$ref_id]);
        if($req->rowCount()== 0) {
            throw new \Exception('impossible de voter pour un enregistrement qui n\'existe pas');
        }
    }

    private function vote($ref,$ref_id,$user_id,$vote){
        if ($_SESSION['auth'] ==1){$this->recordExists($ref,$ref_id);
            $req = $this->pdo->prepare("SELECT id, vote FROM votes WHERE ref=? AND ref_id=? AND user_id=?");
            $req->execute([$ref,$ref_id,$user_id]);
            $vote_row = $req->fetch();
            if($vote_row){
                if($vote_row->vote == $vote){

                    return false;
                }
                var_dump($vote_row);
                $this->former_vote = $vote_row;
                $this->pdo->prepare("UPDATE votes SET vote = ?, created_at = ? WHERE id={$vote_row['id']}")->execute([$vote, date('Y-m-d H:i:s')]);
                return true;

            }
            $req = $this->pdo->prepare("INSERT INTO votes SET ref=?, ref_id=?,user_id=?,created_at=?,vote= $vote");
            $req->execute([$ref, $ref_id, $user_id, date('Y-m-d H:i:s')]);
            return true;}
        return true;

    }

    public function like($ref, $ref_id, $user_id){
        if($this->vote($ref,$ref_id,$user_id, 1)){
            $this->pdo->query("UPDATE FROM $ref SET like_count = like_count + 1 WHERE id = $ref_id");
        }
    }

    public function dislike($ref, $ref_id, $user_id){
        if($this->vote($ref,$ref_id,$user_id, -1)){
            if($this->former_vote){

            }
            $this->pdo->query("UPDATE FROM $ref SET dislike_count = dislike_count + 1 WHERE id = $ref_id");
        }
    }

    public function updateCount($ref,$ref_id){
        $req = $this->pdo->prepare("SELECT COUNT(id) as count, vote FROM votes WHERE ref=? AND ref_id=?  GROUP BY vote");
        $req->execute([$ref,$ref_id]);
        $votes = $req->fetchAll();
        $counts = ['-1' => 0, '1' => 0 ];

        foreach($votes as $vote){
            $counts [$vote->vote] = $vote->count;
        }

        $req = $this->pdo->query("UPDATE $ref SET like_count ={$counts[1]}, dislike_count = {$counts[-1]}}, WHERE id = $ref_id");

        return true;

    }


    /**
    * Permet d'ajouter une classe is-liked ou is-disliked suivant un enregistrement
     * @param $vote
     */
    public static function getClass($vote){
        if($vote){
            return $vote['vote'] == 1 ? 'is-liked' : 'is-disliked';
        }
        return null;
    }


}