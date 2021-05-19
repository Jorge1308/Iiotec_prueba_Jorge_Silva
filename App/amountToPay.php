<?php

    class amountToPay {
        const FIRSTRATE= 25;
        const SECONDRATE= 15;
        const THIRDRATE= 20;
        const FIRSTRATEWEEKEND= 30;
        const SECONDRATEWEEKEND= 20;
        const THIRDRATEWEEKEND= 25;
        private static $dayVal;
        private static $name;
        private static $sum;
        private static $day;
        private static $iniHour;
        private static $finHour;
        private static $varName;
        private static $amount;

        public static function payEmployee($dataFile){
            $daysWorked = fopen($dataFile,"r") or die ("Error al leer el archivo"); //Abrir el archivo .txt con la información
            while(!feof($daysWorked)){
                self::$dayVal=false;
                self::$name="";
                self::$sum=0;
                self::$day="";
                self::$iniHour=null;
                self::$finHour=null;
                self::$varName= true;
                $file=fgets($daysWorked);
                $arrayDaysWorked = str_split($file); // Transformar una linea del archivo a un array
                for($i=0;$i<count($arrayDaysWorked);$i++)
                {
                    if(self::$varName==true){
                        if($arrayDaysWorked[$i] != '=')
                            self::$name=self::$name.$arrayDaysWorked[$i]; //Capturar el nombre del empleado
                        else   
                            self::$varName=false;
                        }
                    else{
                        self::$day=$arrayDaysWorked[$i].$arrayDaysWorked[$i+1]; //Capturar el día
                        self::$iniHour=(int)($arrayDaysWorked[$i+2].$arrayDaysWorked[$i+3]); //Capturar la hora inicial
                        self::$finHour=(int)($arrayDaysWorked[$i+8].$arrayDaysWorked[$i+9]); //Capturar la hora final
                        if((self::$iniHour<self::$finHour)&&(self::$iniHour>=0)&&(self::$iniHour<24)&&(self::$finHour>0)&&(self::$finHour<=24))
                        {
                            if((self::$day=="MO")||(self::$day=="TU")||(self::$day=="WE")||(self::$day=="TH")||(self::$day=="FR")){
                                self::$sum=self::calculateAmount(self::FIRSTRATE,self::SECONDRATE,self::THIRDRATE); //Función para calcular el monto
                            }
                            else{
                                if((self::$day=="SA")||(self::$day=="SU")){   
                                    self::$sum=self::calculateAmount(self::FIRSTRATEWEEKEND,self::SECONDRATEWEEKEND,self::THIRDRATEWEEKEND); //Función para calcular el monto
                                }
                                else{
                                    self::$dayVal=true;
                                }
                            }
                        }
                        $i=$i+13;
                    }
                }
                self::$amount = self::$amount."<br>The amount to pay " .self::$name. " is: ".self::$sum." USD<br/>";
                if(self::$dayVal)
                    self::$amount = self::$amount."There is one or more days that do not correspond to the requested format.<br/>";
            }
            return self::$amount;
        }

        private static function calculateAmount($firstMount,$secondMount,$thirdMount)
        {
            //Validación del horario trabjado para cada día
            $res=0;
            if(self::$iniHour<9){
                if(self::$finHour<=9)
                    $res=self::$sum+((self::$finHour-self::$iniHour)*$firstMount);
                else
                    $res=self::$sum+((9-self::$iniHour)*$firstMount)+((self::$finHour-9)*$secondMount);}
            else{
                if(self::$iniHour<18){
                    if(self::$finHour<=18)
                        $res=self::$sum+((self::$finHour-self::$iniHour)*$secondMount);
                    else
                        $res=self::$sum+((18-self::$iniHour)*$secondMount)+((self::$finHour-18)*$thirdMount);
                }                                
                else
                    $res=self::$sum+((self::$finHour-self::$iniHour)*$thirdMount);
            }
            return $res;
        }
    }
?>