<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表示
        </h2>
    </x-slot>
    <div class="mx-auto px-6">
        <x-message :message="session('message')" />

        <form action="{{ route('post.index') }}" method="GET" class="mb-4 mt-4">
            <div class="input-group flex">
                <select name="search_type" class="w-auto py-2 border border-gray-300 rounded-md">
                    <option value="partial" {{ request('search_type') == 'partial' ? 'selected' : '' }}>部分一致</option>
                    <option value="prefix" {{ request('search_type') == 'prefix' ? 'selected' : '' }}>前方一致</option>
                    <option value="suffix" {{ request('search_type') == 'suffix' ? 'selected' : '' }}>後方一致</option>
                </select>
                <input type="text" name="search" class="w-full py-2 mx-2 border border-gray-300 rounded-md" placeholder="件名を入力してください" value="{{ request('search') }}">
                <x-primary-button class="whitespace-nowrap">
                    検索
                </x-primary-button>
            </div>
        </form>

        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                件名：
                <a href="{{route('post.show',$post)}}" class="text-blue-600">
                    {{$post->title}}
                </a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$post->body}}
            </p>
            <div class="p-4 text-sm font-semibold">
                <p>
                    {{$post->created_at}} / {{$post->user->name}}
                </p>
            </div>
        </div>
        @endforeach
        <div class="mb-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
