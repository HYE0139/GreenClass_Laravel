<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    // p.77 라우트명의 관례 확인하기

    public function index() { // with('변수명', 가져올 데이터)
        $list = Board::select(['id', 'title', 'hits', 'created_at'])->orderby('id', 'desc')->get();
        return view('board/index')->with('list', $list);
        // view(view 파일안의 경로)
       
    }

    public function create() {
        return view('board/create');
    }

    // Request
    // 요청과 함께 제출된 입력, 쿠키 및 파일을 검색
    // 애플리케이션에서 처리 중인 현재 HTTP 요청과 상호 작용하는 객체 지향 방식을 제공
    public function store(Request $req) {
        $board = new Board([
            "title" => $req->input("title"), // = select id , 인자값이 없으면 all - 인자값이 두개면 두번째 값으로 특정 검색
            "ctnt" => $req->input("ctnt"),
            "hits" => 0
        ]);
        $board->save(); //insert : Models의 기본 메소드
        return redirect('/boards');
    }

    public function show(Request $req) {
        $id = $req->input('id'); 
        $board = Board::find($id);
        $board->hits++; // 조회수 증가
        $board->save();
        return view('board/show')->with('data', Board::findOrFail($id));
    }

    // 수정할 때 보여지는 화면
    public function edit(Request $req) {
        $id = $req->input('id');
        return view('board/create')->with('data', Board::findOrFail($id));
    }

    // 수정처리
    public function update(Request $req) {
        $id = $req->input('id');
        $board = Board::findOrFail($id);
        $board->title = $req->input('title');
        $board->ctnt = $req->input('ctnt');
        $board->save();
        return redirect()-> route('boards.show', ["id" => $id]);
    }

    public function destroy(Request $req) {
        $id = $req->input('id'); // find 가 where절에 id값을 넣어준다.
        Board::find($id)->delete();// delete() : Models의 기본 메서드
        return redirect('/boards');
    }
}
