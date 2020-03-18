<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class CountryController extends Controller
{
    public function goCountry($district) {
        
        
        $countryJobs = Job::where('district', $district)->get();
        
        $data = [
            'countryJobs' => $countryJobs,
        ];
        
        $data += $this->countsTwo($data);
        
        return view ('users.country', $data);
        
        
    } 
    
    
    
    
    
}
