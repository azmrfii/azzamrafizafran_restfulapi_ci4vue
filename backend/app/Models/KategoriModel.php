<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class KategoriModel extends Model
{
    protected $table = 'kategories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kategori'];
}