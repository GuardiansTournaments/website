<?php
  
namespace App\Enums;
 
enum UserRoleEnum:int {
    case Admin = 1;
    case Host = 2;
    case User = 3;
}