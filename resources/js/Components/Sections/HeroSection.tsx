import {cn} from "@/Lib/Utils";
import LaravelPath from "@/Components/Sections/LaravelPath";

const HeroSection = () => {
    return (
        <div className="flex flex-col-reverse lg:flex-row min-h-screen w-full items-center justify-center">
            <div className="flex flex-col gap-4">
                <h2 className={cn(
                    "bg-gradient-to-b bg-clip-text py-20 text-3xl font-bold text-transparent lg:text-7xl",
                    "from-neutral-400 to-neutral-800",
                    "dark:from-neutral-300 dark:to-neutral-500"
                )}>
                    Something is cooking
                </h2>
            </div>
            <div className="flex flex-col gap-4">
                <LaravelPath />
            </div>
        </div>
    );
};

export default HeroSection;
