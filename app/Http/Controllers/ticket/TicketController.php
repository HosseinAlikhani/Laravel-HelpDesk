<?php

namespace App\Http\Controllers\ticket;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Resources\ticket\ReadAnswer;
use App\Http\Resources\ticket\TicketListResource;
use App\Http\Resources\ticket\TicketRead;
use App\Priority;
use App\Ticket;
use App\TicketAnswer;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function create($data)
    {
        $attachment = $this->uploadFile($data);
        if ($attachment){
            $data = [
                'user_id'   =>  1,
                'state_id'  =>  1,
                'department_id' =>  $data['department'],
                'priority_id'   =>  $data['priority'],
                'title' =>  $data['title'],
                'message'   =>  $data['message'],
                'attachment'    =>  $attachment,
                'created_at'    =>  verta()->timestamp,
                'updated_at'    =>  verta()->timestamp,
            ];
            $check = Ticket::create($data);
            return $check ? $check : false;
        }else{
            return false;
        }
    }
    public function createAnswer($data)
    {
        $attachment = $this->uploadFile($data);
        $data = [
            'user_id'   =>  1,
            'ticket_id' =>  $data['ticket_id'],
            'message'   =>  $data['message'],
            'attachment'    =>  $attachment,
            'created_at'    =>  verta()->timestamp,
            'updated_at'    =>  verta()->timestamp,
        ];
        $check = TicketAnswer::create($data);
        return $check ? $check : false;
    }

    public function answerValidator($data)
    {
        $value = [
            'message'    =>  'required',
            'attachment'    =>  'required',
        ];
        return Validator::make($data,$value);
    }

    public function submitTicket()
    {
        $title = 'ESTeam - Submit Ticket';
        return view('ticket-submit', compact(['title']));
    }
    public function listTicket()
    {
        $title = ' ESTeam - List Ticket';
        $ticket = Ticket::all();
        $list = json_decode(json_encode(TicketListResource::collection($ticket)));
        if ($list){
            return view('ticket-list', compact(['list', 'title']));
        }else{
            return view('ticket-list', compact(['list', 'title']));
        }
    }
    public function readTicket($id)
    {
        $t = Ticket::where('id', $id)->first();
        if (!empty($t)){
            $ticket['base'] = new TicketRead($t);
            $ticket['answer'] = ReadAnswer::collection($t->answer);
            $ticket = json_decode(json_encode($ticket));
            return view('ticket-read', compact(['ticket']));
        }
        return view('ticket-read');
    }

    public function submitRequest(Request $request)
    {
        $check = $this->create($request->all());
        $messageOk = [
            'message'   =>  'تیکت شما با موفقعیت به ثبت رسید',
            'url'   =>  route('list'),
        ];
        $messageNo = [
            'message'   =>  'در ثبت تیکت با خطا رو به رو شده اید',
            'url'   =>  route('submit'),
        ];
        return $check ?
            response($messageOk, 200):
                response($messageNo, 423);
    }
    public function submitTicketAnswer(Request $request)
    {
        $validator = $this->answerValidator($request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(),423);
        }
        $check = $this->createAnswer($request->all());
        if ($check){
            return response('answer submit successfully',200);
        }else{
            return response('u have a problem to submit answer, try again later', 423);
        }
    }

    public function uploadFile($data)
    {
        $extension = $data['attachment']->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $check = Storage::putFileAs('ticket', $data['attachment'], $filename);
        return $check ? $filename : false;
    }

    public function departmentList()
    {
        return Department::all();
    }
    public function priorityList()
    {
        return Priority::all();
    }
}
