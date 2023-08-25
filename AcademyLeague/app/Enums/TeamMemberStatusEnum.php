<?php
  
namespace App\Enums;
 
enum TeamMemberStatusEnum:int {
    case Accepted = 1;
    case Pending = 2;
    case Denied = 3;
}