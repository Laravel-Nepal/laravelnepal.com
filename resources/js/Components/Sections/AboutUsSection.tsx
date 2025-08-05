import {cn} from "@/Lib/Utils";

const AboutUsSection = () => {
    return (
        <div className={cn(
            "bg-white dark:bg-black",
            "border-2 border-neutral-400 dark:border-neutral-600",
            "rounded-xl",
            "p-18",
            "mt-0 lg:-mt-48"
        )}>
            <h2 className="text-4xl lg:text-7xl text-neutral-800 dark:text-neutral-400 font-extrabold">
                Who are we?
            </h2>
            <div className="flex flex-col gap-4 text-neutral-600 dark:text-neutral-400 text-xl mt-8">
                <p>
                    <strong className="font-bold">Laravel Nepal</strong> is a community-driven initiative dedicated to <span className="text-laravel-red">Laravel</span> developers and enthusiasts across Nepal.
                    We aim to bring together developers, students, and professionals who are building with <span className="text-laravel-red">Laravel</span>.
                </p>
                <p>
                    The use of the <span className="text-laravel-red">Laravel</span> name in our domain has been officially permitted by the <span className="text-laravel-red">Laravel</span> team, under their trademark policy.
                    However, we are not officially affiliated with or endorsed by <span className="text-laravel-red">Laravel</span>.
                </p>
                <p>
                    Whether you’re just starting with <span className="text-laravel-red">Laravel</span> or have years of experience, <strong className="font-bold">Laravel Nepal</strong> is your space to connect, grow, and contribute.
                </p>
            </div>
        </div>
    );
};

export default AboutUsSection;
