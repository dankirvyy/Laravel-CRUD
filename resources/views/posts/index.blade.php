<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Effect */
        .glass-card {
            background-color: rgba(255, 255, 255, 0.05); /* Lighter background for the card */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Subtle glow on hover */
        .glass-card:hover {
            box-shadow: 0 0 20px rgba(78, 205, 196, 0.4), 0 0 10px rgba(78, 205, 196, 0.2);
        }

        /* Neon buttons */
        .btn-neon-green {
            background-color: #4ECDC4;
            color: #1a202c; /* dark text */
            transition: all 0.3s ease;
        }

        .btn-neon-green:hover {
            background-color: #58E4DB;
            box-shadow: 0 0 15px rgba(78, 205, 196, 0.6);
        }

        .btn-neon-blue {
            background-color: #5B8BEB;
            transition: all 0.3s ease;
        }

        .btn-neon-blue:hover {
            background-color: #6A99FF;
            box-shadow: 0 0 15px rgba(91, 139, 235, 0.6);
        }

        .btn-red {
            background-color: #EF4444; /* a standard red to stand out */
            transition: all 0.3s ease;
        }

        .btn-red:hover {
            background-color: #F87171;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.6);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-wider">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-500">
                    Data Stream 
                </span>
                <span class="text-teal-300">|</span> Posts
            </h1>
            <a href="{{ route('posts.create') }}"
               class="px-5 py-2 btn-neon-green text-sm font-semibold rounded-full shadow-lg transform hover:scale-105">
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <span>Add New Entry</span>
                </span>
            </a>
        </div>
        
        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-8 p-4 bg-teal-800 text-teal-200 rounded-lg shadow-xl border border-teal-700">
                <p class="font-medium text-center">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Posts Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        @forelse($posts as $post)
            <div class="glass-card rounded-3xl p-8 mb-6 transform hover:-translate-y-2 transition-all duration-300">
                <h2 class="text-2xl font-bold text-white mb-3">{{ $post->title }}</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    {{ Str::limit($post->content, 120, '...') }}
                </p>
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="px-5 py-2 mb-3 sm:mb-0 btn-neon-blue font-medium text-sm rounded-full transform hover:scale-105">
                        View Log →
                    </a>

                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}"
                           class="px-4 py-2 bg-yellow-500 text-white text-sm font-semibold rounded-full transform hover:scale-105 transition-transform">
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L15.232 5.232z"></path></svg>
                                <span>Edit</span>
                            </span>
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Initiate deletion protocol for this entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 btn-red text-white text-sm font-semibold rounded-full transform hover:scale-105 transition-transform">
                                <span class="flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    <span>Delete</span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

                <p class="mt-6 text-gray-500 text-xs text-right">Last updated {{ $post->updated_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-2">
                <p class="text-gray-400 text-center text-lg">
                    No data available. 
                    <a href="{{ route('posts.create') }}" class="text-teal-400 hover:text-teal-300 underline">
                        Create a new log entry.
                    </a>
                </p>
            </div>
        @endforelse
        </div>
    </div>
</body>
</html>