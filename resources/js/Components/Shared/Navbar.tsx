import useTheme from "@/Hooks/useTheme";
import { cn } from "@/Lib/Utils";
import { Theme } from "@/Types/Enums";
import { SiGithub } from "@icons-pack/react-simple-icons";
import { LaptopMinimal, Moon, Sun } from "lucide-react";
import { motion } from "motion/react";

const ThemeToggler = (props: { className?: string }) => {
    const { className } = props;
    const { setTheme, theme } = useTheme();

    switch (theme) {
        case Theme.Light:
            return <Sun className={className} onClick={() => setTheme(Theme.Dark)} />;
        case Theme.Dark:
            return <Moon className={className} onClick={() => setTheme(Theme.System)} />;
        default:
            return <LaptopMinimal className={className} onClick={() => setTheme(Theme.Light)} />;
    }
};

const Navbar = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Laravel Nepal";
    const iconClass = "cursor-pointer text-neutral-800 dark:text-neutral-300";
    const { theme } = useTheme();
    const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? Theme.Dark : Theme.Light;

    const isDarkMode = theme === Theme.Dark || (theme === Theme.System && systemTheme === Theme.Dark);
    const githubLink = "https://github.com/Laravel-Nepal/laravelnepal.com";

    return (
        <motion.div
            className={cn(
                "shadow-input fixed inset-x-0 top-4 z-50 mx-auto max-w-7xl rounded-full lg:top-12",
                "flex items-center justify-between space-x-4 bg-black/50 px-12 py-6",
            )}
            initial={{
                y: -20,
                backgroundColor: "#00000000",
                backdropFilter: "blur(0px)",
                WebkitBackdropFilter: "blur(0px)",
            }}
            animate={
                isDarkMode
                    ? {
                          y: 0,
                          backgroundColor: "#00000050",
                          backdropFilter: "blur(4px)",
                          WebkitBackdropFilter: "blur(4px)",
                      }
                    : {
                          y: 0,
                          backgroundColor: "#ffffff20",
                          backdropFilter: "blur(4px)",
                          WebkitBackdropFilter: "blur(4px)",
                      }
            }
            transition={{ duration: 0.5 }}
        >
            <h1
                className={cn(
                    "relative bg-gradient-to-r font-bold text-transparent",
                    "select-none",
                    "text-3xl lg:text-4xl",
                    "from-laravel-red to-flag-blue bg-clip-text",
                    "dark:from-laravel-red dark:to-flag-blue",
                )}
            >
                {appName}
            </h1>
            <div className="flex flex-row items-center justify-end gap-3">
                <a href={githubLink} target="_blank" rel="noopener noreferrer">
                    <SiGithub className={iconClass} />
                </a>
                <ThemeToggler className={iconClass} />
            </div>
        </motion.div>
    );
};

export default Navbar;
