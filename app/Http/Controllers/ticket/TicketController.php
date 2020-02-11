<?php

namespace App\Http\Controllers\ticket;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Resources\ticket\TicketListResource;
use App\Priority;
use App\Ticket;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
