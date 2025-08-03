import { cn } from "@/Lib/Utils";
import { motion } from "motion/react";

const Navbar = () => {
    return (
        <motion.div
            className={cn(
                "fixed inset-x-0 top-4 z-50 mx-auto max-w-7xl rounded-full lg:top-12",
                "shadow-input flex items-center justify-between space-x-4 rounded-full bg-black/50 px-12 py-6",
            )}
            initial={{ y: -20, backgroundColor: "#00000000", backdropFilter: "blur(0px)", WebkitBackdropFilter: "blur(0px)" }}
            animate={{ y: 0, backgroundColor: "#00000050", backdropFilter: "blur(7px)", WebkitBackdropFilter: "blur(7px)" }}
            transition={{ duration: 0.5 }}
        >
            Laravel Nepal
        </motion.div>
    );
};

export default Navbar;
