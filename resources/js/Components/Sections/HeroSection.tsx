import SubscribeToNewsLetter from "@/Components/Forms/SubscribeToNewsLetter";
import LaravelPath from "@/Components/Sections/LaravelPath";
import { cn } from "@/Lib/Utils";

const HeroSection = () => {
    return (
        <div
            className={cn(
                "h-full max-h-screen lg:h-screen",
                "w-full",
                "flex flex-col-reverse lg:flex-row",
                "items-center justify-center",
                "gap-24",
                "px-8 py-48 lg:px-0 lg:py-0",
            )}
        >
            <div className="flex flex-col gap-4">
                <h2
                    className={cn(
                        "bg-clip-text text-3xl font-bold text-transparent lg:text-7xl",
                        "from-laravel-red to-flag-blue",
                        "bg-gradient-to-b dark:bg-gradient-to-r",
                    )}
                >
                    Connect. Build. Grow.
                </h2>
                <div className="text-3xl text-neutral-500 dark:text-neutral-400">
                    Join a vibrant hub of <span className="text-flag-blue">Nepali</span> <span className="text-laravel-red">Laravel</span> developers.
                </div>
                <SubscribeToNewsLetter />
            </div>
            <div className="flex flex-col gap-4">
                <LaravelPath />
            </div>
        </div>
    );
};

export default HeroSection;
