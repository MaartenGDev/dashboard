<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Flash;
use App\Models\Note;
use App\Models\QueryBuilder;
use App\Models\Redirect;
use App\Models\Validator;
use App\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        return 'oi';
    }

    public function addNote(Request $request)
    {
        $oValidator = Validator::make($request->all(),
            array(
                'name' => 'min:2|max:50|alpha',
                'email' => 'min:2|max:50|email',
                'website' => 'min:2|max:50|website',
                'message' => 'min:2|max:150|alpha',
            )
        );
        if($oValidator->fails()){         
            $redirect = new Redirect('notes/add'); 
            $redirect->withInput($request);
            $redirect->withErrors($request,$oValidator->all());
            $redirect->send();
        }
        $oNote = new Note($request->all());
        $oNote->save();

        Flash::make(Flash::FLASH_SUCCESS,array('Item has successfully been created'));
        return new Redirect(Redirect::REDIRECT,'notes');
    }

    public function showForm(){
        return new View('note.add');
    }
    
    public function listNotes(Request $request, Validator $validator){
var_dump($request);
        $oNotes = new QueryBuilder();
        $aNotes = $oNotes->select()->from('notes')->result();

        return new View('note.list',array('notes' =>$aNotes));
    }
}