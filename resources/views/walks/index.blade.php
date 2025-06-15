{{-- resources/views/dogwalk/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">散歩記録一覧</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('walks.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">新規記録を追加</a>

    @if ($walks->isEmpty())
        <p>まだ散歩記録がありません。</p>
    @else
        <ul class="space-y-4">
            @foreach ($walks as $walk)
                <li class="p-4 border rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $walk->date }}</h2>
                    <p><strong>場所：</strong>{{ $walk->location }}</p>
                    <p><strong>メモ：</strong>{{ $walk->memo }}</p>

                    <div class="mt-2">
                        <a href="{{ route('walks.show', $walk) }}" class="text-blue-600 hover:underline mr-4">詳細</a>
                        <a href="{{ route('walks.edit', $walk) }}" class="text-yellow-600 hover:underline mr-4">編集</a>
                        <form action="{{ route('walks.destroy', $walk) }}" method="POST" class="inline-block" onsubmit="return confirm('本当に削除しますか？')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">削除</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
