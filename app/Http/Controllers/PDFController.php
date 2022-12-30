<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $visitors = Visitor::get();
  
        $data = [
            'title' => 'Ticket',
            'date' => date('m/d/Y'),
            'users' => $visitors
        ]; 
            
        $pdf = PDF::loadView('tickettest', $data);
     
        return $pdf->download('ticket.pdf');
    }
}
