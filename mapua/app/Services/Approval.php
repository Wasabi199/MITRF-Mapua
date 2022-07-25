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
            case 'Reviewing':
                return 'Reviewing';
            break;
            case 'Pending':
                return 'Pending';
            break;
            case 'Rejected':
                return 'Rejected';
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