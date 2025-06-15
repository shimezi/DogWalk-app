@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">散歩記録の詳細</h1>

    <div class="p-4 border rounded shadow mb-6">
        <p><strong>日付：</strong>{{ $walk->date }}</p>
        <p><strong>時間：</strong>{{ $walk->time ?? '未記入' }}</p>
        <p><strong>場所：</strong>{{ $walk->location }}</p>
        <p><strong>メモ：</strong><br>{{ $walk->memo ?: '（なし）' }}</p>
    </div>

    <div class="flex space-x-4">
        <a href="{{ route('walks.edit', $walk) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">編集</a>

        <form action="{{ route('walks.destroy', $walk) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">削除</button>
        </form>

        <a href="{{ route('walks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">一覧に戻る</a>
    </div>
</div>
@endsection
