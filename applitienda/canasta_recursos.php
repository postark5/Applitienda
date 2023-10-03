<?
function hoy(){
        $hoy=getdate(time());
        $fecha=$hoy ["mday"]."de".$hoy ["month"];
        return $fecha;}

function conecta($bd){
        $cn=mysgli_connect("localhost", "root", "");
        if(!$cn){
                echo "No se pudo conectar";
        }else{ 
        $n = mysqli_select_db($cn,$bd);
        if (!$n){ 
            echo "BD no existe";
        return 0;
        }else{ 
            return $cn;};
        } ;
};

function iniciasesion(){
        session_start();
        session_register('cart');
}
function terminasesion(){
        unset($cart);
        session_destroy();
}
?>