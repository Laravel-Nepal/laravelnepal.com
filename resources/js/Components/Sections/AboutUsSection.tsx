import { cn } from "@/Lib/Utils";
import { motion } from "motion/react";

const AboutUsSection = () => {
    return (
        <motion.div
            className={cn("container", "bg-white dark:bg-black", "border-2 border-neutral-400 dark:border-neutral-600", "rounded-xl", "p-8 lg:p-18")}
            initial={{ opacity: 0, y: 200 }}
            whileInView={{ opacity: 1, y: -100 }}
            exit={{ opacity: 0, y: 0 }}
            transition={{ duration: 0.5 }}
        >
            <h2 className="text-4xl font-extrabold text-neutral-800 lg:text-7xl dark:text-neutral-400">Who are we?</h2>
            <div className="mt-8 flex flex-col gap-4 text-xl text-neutral-600 dark:text-neutral-400">
                <p>
                    <strong className="font-bold">Laravel Nepal</strong> is a community-driven initiative dedicated to{" "}
                    <span className="text-laravel-red">Laravel</span> developers and enthusiasts across Nepal. We aim to bring together developers,
                    students, and professionals who are building with <span className="text-laravel-red">Laravel</span>.
                </p>
                <p>
                    The use of the <span className="text-laravel-red">Laravel</span> name in our domain has been officially permitted by the{" "}
                    <span className="text-laravel-red">Laravel</span> team, under their trademark policy. However, we are not officially affiliated
                    with or endorsed by <span className="text-laravel-red">Laravel</span>.
                </p>
                <p>
                    Whether you’re just starting with <span className="text-laravel-red">Laravel</span> or have years of experience,{" "}
                    <strong className="font-bold">Laravel Nepal</strong> is your space to connect, grow, and contribute.
                </p>
            </div>
        </motion.div>
    );
};

export default AboutUsSection;
