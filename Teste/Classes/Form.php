<?php
 
    class Form{

        public static function alert($tipo, $mensagem)
        {
            echo $mensagem;
            if($tipo == 'erro')
            {
                return false;
            }else if($tipo == 'sucesso')
            {
                return true;
            }
        }

        public static function cadastrar($cpf,$creci,$nome)
        {
            $sql = Mysql::conectar()->prepare("INSERT INTO corretor VALUES (null,?,?,?)");

            $sql->execute(array($cpf,$creci,$nome));
        }

        public static function buscarDados()
        {
            $sql = Mysql::conectar()->prepare("SELECT * FROM corretor");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function editar($cpf, $creci, $nome)
        {
            $sql = Mysql::conectar()->prepare("UPDATE corretor SET creci = ?, nome = ? WHERE cpf = ?");
            $sql->execute(array($creci, $nome, $cpf));
        }

        public static function excluir($cpf)
        {
            $sql = Mysql::conectar()->prepare("DELETE FROM corretor WHERE cpf = ?");
            $sql->execute(array($cpf));
        }
    }

?>