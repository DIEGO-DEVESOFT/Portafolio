<!-- Esta es la clase de la pregunta cuando el campo en la tabla de datos es autoincrementable se define aca la variable -->
<?php 
class Pregunta{
    # Atributos
    private $dbh;
    protected $ID;
    protected $NombreCompleto;
    protected $email;
    protected $Pregunta;

    # Sobrecarga de Constructores
    public function __construct()
    {
        try {
            $this->dbh = DataBase::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function __construct4($ID, $NombreCompleto, $email, $Pregunta)
    {
        $this->ID = $ID;
        $this->NombreCompleto = $NombreCompleto;
        $this->email = $email;
        $this->Pregunta = $Pregunta;
    }

    public function __construct3($NombreCompleto, $email, $Pregunta)
    {
        $this->NombreCompleto = $NombreCompleto;
        $this->email = $email;
        $this->Pregunta = $Pregunta;
    }

    # Métodos: $ID
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getID()
    {
        return $this->ID;
    }


    # Métodos: $Nombrecompleto
    public function setNombreCompleto($NombreCompleto)
    {
        $this->NombreCompleto = $NombreCompleto;
    }
    public function getNombreCompleto()
    {
        return $this->NombreCompleto;
    }

    # Métodos: $Email
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function getemail()
    {
        return $this->email;
    }

    # Métodos: $Pregunta
    public function setPregunta($Pregunta)
    {
        $this->Pregunta = $Pregunta;
    }
    public function getPregunta()
    {
        return $this->Pregunta;
    }

    public function RegistrarPregunta()
    {
        try {
            $sql = 'INSERT INTO PREGUNTAS VALUES (
                            :ID,
                            :NombreCompleto,
                            :email,
                            :Pregunta
                        )';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('ID', $this->getID());
            $stmt->bindValue('NombreCompleto', $this->getNombreCompleto());
            $stmt->bindValue('email', $this->getemail());
            $stmt->bindValue('Pregunta', $this->getPregunta());
            $stmt->execute();
        }catch (Exception $e) {
        die($e->getMessage());}
        
    }
    

}