import { Variants } from "motion";
import { motion } from "motion/react";
import { useState } from "react";
import { sidebarItems } from "@/Lib/variables";
import { SidebarItemProps } from "@/Types/Types";
import { MoveRight } from "lucide-react";
import { cn } from "@/Lib/Utils";
import { route } from "ziggy-js";
import { Link } from "@inertiajs/react";

interface PathProps {
    d?: string;
    variants: Variants;
    transition?: { duration: number };
}

const Path = (props: PathProps) => (
    <motion.path className="cursor-pointer stroke-black dark:stroke-white" strokeWidth="3" strokeLinecap="round" {...props} />
);

const MotionIcon = motion.create(MoveRight);
const MotionLink = motion.create(Link);

const NavigationLink = (props: { item: SidebarItemProps; index: number }) => {
    const { item, index } = props;

    const arrowIconComponent = {
        notHovered: {
            opacity: 0,
            width: 0,
        },
        hovered: {
            opacity: 1,
            width: 48,
        },
    };

    const textComponent = {
        notHovered: {
            x: 0,
        },
        hovered: {
            x: 5,
        },
    }

    return (
        <MotionLink
            href={route(item.href)}
            className={cn(
                "text-4xl",
                "text-neutral-700 hover:text-neutral-500",
                "dark:text-neutral-100 dark:hover:text-neutral-300",
                "flex flex-row",
                "gap-2",
                "justify-center items-center"
            )}
            transition={{ delay: index * 0.1 + 0.3, type: "spring", stiffness: 300 }}
            initial="notHovered"
            whileHover="hovered"
        >
            <MotionIcon className="text-neutral-900 dark:text-neutral-100" variants={arrowIconComponent} />
            <motion.h2 className="text-3xl font-semibold text-neutral-900 dark:text-neutral-100" variants={textComponent}>
                {item.title}
            </motion.h2>
        </MotionLink>
    );
};

const Navigation = () => {
    return (
        <motion.div
            className="fixed inset-0 z-[999] bg-white dark:bg-black w-screen h-screen"
            variants={{
                open: (height = 1000) => ({
                    transition: {
                        type: "spring",
                        stiffness: 20,
                        restDelta: 2,
                    },
                    clipPath: `circle(${height * 2 + 200}px at 40px 40px)`,
                }),
                closed: {
                    transition: {
                        delay: 0.2,
                        type: "spring",
                        stiffness: 400,
                        damping: 40,
                    },
                    clipPath: "circle(0px at 100vw 0)",
                },
            }}
        >
            <motion.div className="flex h-full flex-col items-center justify-center gap-12">
                {sidebarItems.map((item, index) => (
                    <NavigationLink key={item.title} item={item} index={index} />
                ))}
            </motion.div>
        </motion.div>
    );
};

const NavbarHamburger = () => {
    const [isOpen, setIsOpen] = useState<boolean>(false);

    const toggle = () => setIsOpen(!isOpen);

    return (
        <>
            <motion.div
                className="item-center flex h-[24px] w-[24px] justify-center lg:hidden"
                onClick={toggle}
                initial={false}
                animate={isOpen ? "open" : "closed"}
            >
                <motion.svg
                    width="24"
                    height="24"
                    viewBox="0 0 22 20"
                    className="z-[1000]"
                    variants={{
                        open: { position: "fixed" },
                        closed: { position: "relative" },
                    }}
                >
                    <Path
                        variants={{
                            closed: { d: "M 2 2.5 L 20 2.5" },
                            open: { d: "M 3 16.5 L 17 2.5" },
                        }}
                    />
                    <Path
                        d="M 2 9.423 L 20 9.423"
                        variants={{
                            closed: { opacity: 1 },
                            open: { opacity: 0 },
                        }}
                        transition={{ duration: 0.1 }}
                    />
                    <Path
                        variants={{
                            closed: { d: "M 2 16.346 L 20 16.346" },
                            open: { d: "M 3 2.5 L 17 16.346" },
                        }}
                    />
                </motion.svg>
                <Navigation />
            </motion.div>
        </>
    );
};

export default NavbarHamburger;
