import useTheme from "@/Hooks/useTheme";
import { cn } from "@/Lib/Utils";
import { SiGithub } from "@icons-pack/react-simple-icons";
import {Moon, Sun, LaptopMinimal} from "lucide-react";
import { motion } from "motion/react";
import {Theme} from "@/Types/Enums";
import {FC} from "react";

const ThemeToggler = () => {
    const { setTheme, theme } = useTheme();
    console.log(theme);

    switch(theme) {
        case Theme.Light:
            return <Sun className="cursor-pointer text-yellow-400" onClick={() => setTheme(Theme.Dark)} />;
        case Theme.Dark:
            return <Moon className="cursor-pointer text-blue-400" onClick={() => setTheme(Theme.System)} />;
        default:
            return <LaptopMinimal className="cursor-pointer text-gray-400" onClick={() => setTheme(Theme.Light)} />;

    }
}

const Navbar = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Laravel Nepal";
    const { toggleTheme } = useTheme();
    return (
        <motion.div
            className={cn(
                "shadow-input fixed inset-x-0 top-4 z-50 mx-auto max-w-7xl rounded-full lg:top-12",
                "flex items-center justify-between space-x-4 bg-black/50 px-12 py-6",
            )}
            initial={{ y: -20, backgroundColor: "#00000000", backdropFilter: "blur(0px)", WebkitBackdropFilter: "blur(0px)" }}
            animate={{ y: 0, backgroundColor: "#00000050", backdropFilter: "blur(4px)", WebkitBackdropFilter: "blur(4px)" }}
            transition={{ duration: 0.5 }}
        >
            <h1 className="relative bg-gradient-to-b from-neutral-200 to-neutral-500 bg-clip-text text-3xl font-bold text-transparent">{appName}</h1>
            <div className="flex flex-row items-center justify-end gap-3">
                <SiGithub className="text-neutral-300" />
                <ThemeToggler />
            </div>
        </motion.div>
    );
};

export default Navbar;
