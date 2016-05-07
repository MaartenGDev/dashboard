<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Note;
use App\Models\QueryBuilder;
use App\Models\Redirect;
use App\Models\Validator;
use App\Http\Request;

class NoteController extends Controller
{
    public function addNote(Request $request)
    {
        $oValidator = Validator::make($request->all(),
            array(
                'name' => 'min:2|max:50|alpha',
                'email' => 'min:2|max:50|email',
                'website' => 'min:2|max:50|url',
                'message' => 'min:2|max:150|alpha',
            )
        );
        if($oValidator->fails()){
            $request->flash('errors',$oValidator->all());
            return new Redirect('notes/add');
        }

        $oNote = new Note($request->all());
        $oNote->save();

        $request->flash('messages','Item has successfully been created');
        return new Redirect('notes');
    }

    public function showForm(){
        return new View('note.add');
    }
    
    public function listNotes(Request $request){
        $oNotes = new QueryBuilder();
        $aNotes = $oNotes->select()->from('notes')->result();
        return new View('note.list',array('notes' =>$aNotes));
    }
    public function getNote(Note $note){
        return new View('note.note',array('note' => $note));
    }
}