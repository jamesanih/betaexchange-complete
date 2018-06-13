<?php 


namespace App\Helpers;

/**
* 
*/
class Utility 
{
	


    
     //Title selection
        public static function Titles()
        {
            return array("Professor"=>"Professor", 
              "Dr"=>"Dr", 
              "Mr"=>"Mr", "Mrs"=>"Mrs" ,"Other"=>"Other");
        }


        // Sex selection
        public static function Gender()
        {
            return array("Male"=>"Male", "Female"=>"Female");
        }

        // Sex selection
        public static function CurrencyType()
        {
            return array("Bitcoin"=>"Bitcoin", "Perfect Money"=>"Perfect Money");
        }

       



        // Secret questions
        public static function SecretQuestions()
        {
            return array("1"=>"Mother's Maiden Name",
            	"2"=>"What is your favorite Color?",
            	"3"=>"What is your pet’s name ?",
            	"4"=>"Where were you born ?");
           
        }

      
        
        // OptionType selection
        public static function Status()
        {
            return array("0"=>"",
                        "1"=>"Registered",
                        "2"=>"Confirmed",
                        "3"=>"Activate",
                        "4"=>"Deactivate");
        }

        public static function ActivationStatus()
        {
            return array("0"=>"",
                        "1"=>"Processing..",
                        "2"=>"Completed",
                        "3"=>"Canceled",
                        "4"=>"Custom Status");
        }


        public static function PaymentMethod()
        {
            return array("1"=>"Internet Bank Transfer",
                        "2"=>"Bank Deposit",
                        "3"=>"Short Code",
                        );
        }


        public static function GetRelationships()
        {
            return array(
                "Father"=>"Father", 
                "Wife"=>"Wife",
                "Mother"=>"Mother",
                "Uncle"=>"Uncle",
                "Aunty"=>"Aunty",
                "Brother"=>"Brother",
                "Sister"=>"Sister"
                
                );
        }
        
        public static function GetBanks()
        {
            return array("Access Bank"=>"Access Bank",
                "Citibank"=>"Citibank",
                "Diamond Bank"=>"Diamond Bank",
                "Ecobank Nigeria"=>"Ecobank Nigeria",
                "Fidelity Bank Nigeria"=>"Fidelity Bank Nigeria",
                "First Bank of Nigeria"=>"First Bank of Nigeria",
                "First City Monument Bank"=>"First City Monument Bank",
                "Guaranty Trust Bank"=>"Guaranty Trust Bank",
                "Heritage Bank plc"=>"Heritage Bank plc",
                "Keystone Bank Limited"=>"Keystone Bank Limited",
                "Skye Bank"=>"Skye Bank",
                "IBTC Bank"=>"IBTC Bank",
                "Standard Chartered Bank"=>"Standard Chartered Bank",
                "Sterling Bank"=>"Sterling Bank",
                "Union Bank of Nigeria"=>"Union Bank of Nigeria",
                "Wema Bank"=>"Wema Bank",
                "Unity Bank plc"=>"Unity Bank plc",
                "United Bank for Africa"=>"United Bank for Africa",
                "Zenith Bank"=>"Zenith Bank"
                );
           
        }



}