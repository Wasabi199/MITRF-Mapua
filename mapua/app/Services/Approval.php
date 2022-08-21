<?php
namespace App\Services;

class Approval{

    public static function approval(String $approval){

        switch($approval){
            case 'All':
                return null;
            break;
            case 'Approved':
                return 'Approved';
            break;
            case 'For Approval':
                return 'For Approval';
            break;
            case 'Submitted':
                return 'Submitted';
            break;
            case 'Denied':
                return 'Denied';
            break;
            case 'For Release':
                return 'For Release';
            break;
            default:
                return null;
            }
        }
        public static function status(String $approval){

            switch($approval){
                case 'All':
                    return null;
                break;
                case 'Approved':
                    return 'Aprrove';
                break;
                case 'Processing':
                    return 'Processing';
                break;
                case 'Pending':
                    return 'Pending';
                break;
                default:
                    return null;
                }
            }
       
}


?>