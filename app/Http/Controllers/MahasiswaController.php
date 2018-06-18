<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Mahasiswa;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort     = explode('|', $request->query('sort', 'id|asc'));
        $page     = (int) $request->get('page', 1);
        $limit    = 10;
        
        $total    = Mahasiswa::all()->count();
        $lastPage = ceil($total / $limit);
        
        $offset   = ($page - 1) * $limit;
        
        $from     = $offset;
        $to       = $from + $limit;
        
        $data     = Mahasiswa::limit($limit)
                            ->offset($offset)
                            ->orderBy($sort[0], $sort[1])
                            ->join('jurusan', 'mahasiswa.major', '=', 'jurusan.id')
                            ->select(
                                'mahasiswa.id',
                                'mahasiswa.fullname',
                                'mahasiswa.email',
                                'mahasiswa.address',
                                'mahasiswa.birth',
                                'mahasiswa.gender',
                                'jurusan.name AS major')
                            ->get();
        
        return response()->json([
            'total'         => $total,
            'per_page'      => $limit,
            'current_page'  => $page,
            'last_page'     => $lastPage,
            'next_page_url' => ($page == $lastPage) ? null : url()->current() . '?page=' . ($page + 1),
            'prev_page_url' => ($page == 1) ? null : url()->current() . '?page=' . ($page - 1),
            'to'            => $to,
            'from'          => $from,
            'data'          => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'bail|required',
            'email'    => 'bail|required|email',
            'major'    => 'bail|required',
            'address'  => 'bail|required',
            'birth'    => 'bail|required',
            'gender'   => 'bail|required'
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            
            return response()->json([
                'errors' => $errors->all()
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $mahasiswa = new Mahasiswa;
        
        $mahasiswa->fullname = $request->input('fullname');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->major = $request->input('major');
        $mahasiswa->address= $request->input('address');
        $mahasiswa->birth = $request->input('birth');
        $mahasiswa->gender = $request->input('gender');
        
        $mahasiswa->save();
        
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Mahasiswa::join('jurusan', 'mahasiswa.major', '=', 'jurusan.id')
                            ->select(
                                'mahasiswa.id',
                                'mahasiswa.fullname',
                                'mahasiswa.major',
                                'mahasiswa.email',
                                'mahasiswa.address',
                                'mahasiswa.birth',
                                'mahasiswa.gender',
                                'jurusan.name AS major_name')->find($id);
                            
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'bail|required',
            'email'    => 'bail|required|email',
            'major'    => 'bail|required',
            'address'  => 'bail|required',
            'birth'    => 'bail|required',
            'gender'   => 'bail|required'
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            
            return response()->json([
                'errors' => $errors->all()
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $mahasiswa = Mahasiswa::find($id);
        
        $mahasiswa->fullname = $request->input('fullname');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->major = $request->input('major');
        $mahasiswa->address= $request->input('address');
        $mahasiswa->birth = $request->input('birth');
        $mahasiswa->gender = $request->input('gender');
        
        $mahasiswa->save();
        
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        
        $mahasiswa->delete();
        
        return response()->json([
            'succcess' => true
        ]);
    }
}
