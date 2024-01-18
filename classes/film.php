<?
    class Film{
        public $id_film;
        public $name_film;
        public $description;
        public $id_category;
        public $director;
        public $id_nation;
        public $imagefile;
        public $status;
        public $performer;

        public function __construct($id_film ='',$name_film='', $description = '', $id_category='', $director='',$id_nation='',$imagefile='',$status='',$performer=''){
            if($id_film !='' && $name_film !='' && $description != ''&& $id_category!='' && $director!='' && $id_nation!='' && $imagefile !='' && $status !='' && $performer !=''){
                $this->id_film = $id_film;
                $this->name_film = $name_film;
                $this->description = $description;
                $this->id_category = $id_category;
                $this->director = $director;
                $this->id_nation = $id_nation;
                $this->imagefile = $imagefile;
                $this->status = $status;
                $this->performer = $performer;
            }
        }

        public function getAll($conn){
            try{
                $sql = "select * from films;";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Film');
                $stmt->execute();
                return $stmt->fetchAll();
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getId($conn, $id_film){
            try{
                $sql = "select * from films where id_film=:id_film;";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id_film', $id_film, PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Film');
                $stmt->execute();
                return $stmt->fetchAll();
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }

?>