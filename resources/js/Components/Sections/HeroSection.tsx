import {cn} from "@/Lib/Utils";
import LaravelPath from "@/Components/Sections/LaravelPath";

const HeroSection = () => {
    return (
        <div className="flex flex-col-reverse lg:flex-row gap-24 max-h-screen h-[50vh] lg:h-screen w-full items-center justify-center px-8 lg:px-0 py-48 lg:py-0">
            <div className="flex flex-col gap-4">
                <h2 className={cn(
                    "bg-gradient-to-b bg-clip-text text-3xl font-bold text-transparent lg:text-7xl",
                    "from-neutral-400 to-neutral-800",
                    "dark:from-neutral-300 dark:to-neutral-500"
                )}>
                    Connect. Build. Grow.
                </h2>
                <div className="text-neutral-500 dark:text-neutral-400 text-3xl">
                    Join a vibrant hub of <span className="text-flag-blue">Nepali</span> <span className="text-laravel-red">Laravel</span> developers.
                </div>
            </div>
            <div className="flex-col gap-4 hidden lg:flex">
                <LaravelPath />
            </div>
        </div>
    );
};

export default HeroSection;
