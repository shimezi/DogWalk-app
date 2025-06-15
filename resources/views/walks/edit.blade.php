@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">散歩記録を編集</h1>

    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('walks.update', $walk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="date" class="block font-semibold">日付</label>
            <input type="date" name="date" id="date" value="{{ old('date', $walk->date) }}" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="time" class="block font-semibold">時間（任意）</label>
            <input type="time" name="time" id="time" value="{{ old('time', $walk->time) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="location" class="block font-semibold">場所</label>
            <input type="text" name="location" id="location" value="{{ old('location', $walk->location) }}" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="memo" class="block font-semibold">メモ（任意）</label>
            <textarea name="memo" id="memo" rows="4" class="w-full border rounded px-3 py-2">{{ old('memo', $walk->memo) }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                更新する
            </button>
        </div>
    </form>
</div>
@endsection
