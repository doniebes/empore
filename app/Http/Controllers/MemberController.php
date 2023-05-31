<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $members = Member::all();
        $title = 'Anggota';
        return view('members.index', compact('members', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = 'Tambah Data';
        return view('members.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
           'member_name' => 'required',
           'member_phone' => 'required',
           'member_email' => 'required',
           'member_password' => 'required',
           'member_address' => 'required'
        ]);

        // Simpan data buku ke dalam database
        $created = Member::create($validatedData);

        if($created){
            // Redirect ke halaman yang diinginkan setelah menyimpan data success
            return redirect()->route('members.index')->with('success', 'Member created successfully.');
        }else{
            // Redirect ke halaman yang diinginkan setelah menyimpan data failed
            return redirect()->route('members.index')->with('error', 'Member created failed.');
        }

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $member = Member::findOrFail($id);
        return view('members.form', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Validasi data yang diterima dari form
        $request->validate([
            'member_name' => 'required',
            'member_phone' => 'required',
            'member_email' => 'required',
            'member_password' => 'required',
            'member_address' => 'required',
        ]);

        // Temukan buku berdasarkan id
        $member = Member::find($id);

        // Periksa apakah buku ditemukan
        if ($member) {
            // Update data buku dengan data yang diterima dari form
            $member->member_name        = $request->input('member_name');
            $member->member_phone       = $request->input('member_phone');
            $member->member_email       = $request->input('member_email');
            $member->member_password    = $request->input('member_password');
            $member->member_address     = $request->input('member_address');
            $member->save();

            return redirect()->route('members.index')->with('success', 'Member updated successfully.');
        } else {
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
         $member = $member = Member::find($id);

        // Hapus buku dari database
        if ($member) {
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
        } else {
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }
    }
}
