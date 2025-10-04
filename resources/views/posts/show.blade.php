<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Log Entry</title>
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
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Neon buttons */
        .btn-neon-yellow {
            background-color: #FACC15; /* yellow-400 */
            color: #1a202c; /* dark text */
            transition: all 0.3s ease;
        }
        .btn-neon-yellow:hover {
            background-color: #FDE047; /* yellow-300 */
            box-shadow: 0 0 15px rgba(250, 204, 21, 0.6);
            transform: scale(1.05);
        }

        .btn-red {
            background-color: #EF4444; /* a standard red to stand out */
            transition: all 0.3s ease;
        }

        .btn-red:hover {
            background-color: #F87171;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.6);
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        {{-- Back Button --}}
        <a href="{{ route('posts.index') }}" 
           class="inline-flex items-center space-x-2 mb-8 px-6 py-3 border border-gray-700 text-gray-400 rounded-full text-sm font-semibold hover:bg-gray-800 hover:text-white transition-all duration-300 transform hover:-translate-x-2">
           <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
           <span>Return to Archive</span>
        </a>

        {{-- Post Card --}}
        <div class="glass-card rounded-3xl p-8 lg:p-12">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-wider mb-6 leading-tight">
                {{ $post->title }}
            </h1>
            <p class="text-gray-400 text-lg leading-relaxed mb-8">
                {{ $post->content }}
            </p>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-t border-gray-700 pt-6">
                <p class="text-gray-500 text-xs sm:text-sm font-medium mb-4 sm:mb-0">
                    <span class="text-gray-300">Created:</span> {{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i A') }}
                    <span class="ml-2 text-gray-500 font-normal">({{ $post->created_at->diffForHumans() }})</span>
                </p>

                {{-- Action Buttons --}}
                <div class="flex space-x-3 mt-4 sm:mt-0">
                    <a href="{{ route('posts.edit', $post->id) }}" 
                       class="px-6 py-2 btn-neon-yellow text-white text-sm font-semibold rounded-full shadow-lg transform hover:scale-105">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L15.232 5.232z"></path></svg>
                            <span>Edit</span>
                        </span>
                    </a>
    
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Initiate deletion protocol for this log entry?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-6 py-2 btn-red text-white text-sm font-semibold rounded-full shadow-lg transform hover:scale-105">
                            <span class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span>Delete</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>