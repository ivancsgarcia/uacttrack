<script>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="h-screen flex flex-col items-center justify-center">
        <h1 class="text-7xl mb-4 text-[#ff6b6b]">404</h1>
        <p class="text-xl mb-5">Oops! The page you're looking for doesn't exist.</p>
        <p class="text-xl mb-5">It might have been moved, deleted, or the URL could be incorrect.</p>
        <Link href="/"><span class="bg-[#007bff] text-white py-3 px-6 rounded-md text-base inline-block hover:bg-[#0056b3]">Go Back to Home</span></Link>
    </div>
</template>