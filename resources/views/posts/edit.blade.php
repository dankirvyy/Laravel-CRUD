<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Effect */
        .glass-form {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Neon focus glow for inputs */
        .input-glow:focus {
            outline: none;
            border-color: #FACC15; /* A bright, vibrant yellow for edit */
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.5);
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

        .btn-back {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ccc;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{-- Page Title --}}
        <div class="mb-12 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-wider">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-500">
                    Edit Data Log
                </span>
            </h1>
            <p class="text-gray-500 mt-2">Modify the selected entry in the post database.</p>
        </div>

        {{-- Form Container --}}
        <div class="glass-form rounded-3xl p-8 transform hover:-translate-y-2 transition-all duration-300">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-gray-400 font-medium mb-2 uppercase text-sm tracking-wide">
                        Title
                    </label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                           class="input-glow w-full p-3 bg-gray-800 border-2 border-transparent rounded-lg text-white placeholder-gray-500 transition-all duration-300"
                           required>
                </div>

                <div class="mb-8">
                    <label for="content" class="block text-gray-400 font-medium mb-2 uppercase text-sm tracking-wide">
                        Content
                    </label>
                    <textarea id="content" name="content" rows="8"
                              class="input-glow w-full p-3 bg-gray-800 border-2 border-transparent rounded-lg text-white placeholder-gray-500 transition-all duration-300"
                              required>{{ $post->content }}</textarea>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <a href="{{ route('posts.index') }}"
                       class="w-full sm:w-auto px-6 py-3 btn-back rounded-full text-sm font-semibold text-center hover:shadow-lg transform hover:scale-105">
                       <span class="flex items-center justify-center space-x-2">
                           <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                           <span>Return to Archive</span>
                       </span>
                    </a>
                    <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 btn-neon-yellow rounded-full shadow-lg font-semibold transform hover:scale-105">
                        <span class="flex items-center justify-center space-x-2">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-3m-6-10l-3 3m0 0l-3-3m3 3V3m6 18H8"></path></svg>
                           <span>Update Log</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>