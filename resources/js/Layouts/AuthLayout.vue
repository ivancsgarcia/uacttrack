<template>
    <div class="relative min-h-screen w-full">
        <div
            class="flex min-h-screen w-full flex-col items-center justify-center py-4 lg:w-1/2"
        >
            <img
                src="/public/images/sys-logos/UActTrack-no-logo.png"
                alt="uacttrack-logo"
                class="mb-4 w-64"
            />
            <slot></slot>
        </div>
        <img
            src="/public/images/sys-logos/ua-logo.png"
            alt="ua-logo"
            class="fixed bottom-[-35px] right-[-35px] size-[700px] rotate-12 opacity-25 grayscale"
        />
    </div>
</template>
