import { cn } from "@/Lib/Utils";
import { type SidebarItemProps } from "@/Types/Types";
import { HomeIcon } from "lucide-react";
import { route } from "ziggy-js";

const Sidebar = (props: {
    className?: string;
}) => {
    const { className } = props;

    const sidebarItems: SidebarItemProps[] = [
        {
            title: "Home",
            href: 'page.landingPage',
            icon: HomeIcon,
        },
    ];

    return (
        <div className={cn(
            "flex flex-col",
            "justify-start items-start",
            "w-1/5",
            className
        )}>
            <div className="px-3 text-xl uppercase font-bold mb-2">
                Main Menu
            </div>
            {sidebarItems.map((item) => {
                const {title, href, icon: Icon} = item;
                const routeIsActive = route().current(href);

                return (
                    <a
                        key={title}
                        href={route(href)}
                        className={cn(
                            "flex flex-row",
                            "justify-start items-center",
                            "gap-2",
                            "w-full",
                            "text-lg font-normal",
                            "text-gray-900 dark:text-gray-300",
                            "hover:text-laravel-red/90",
                            routeIsActive && cn(
                                "font-medium",
                                "bg-laravel-red/10 dark:bg-laravel-red/40",
                                "text-laravel-red/80 dark:text-gray-300",
                                "hover:text-laravel-red dark:hover:text-white"
                            ),
                            "py-2 px-3",
                        )}
                    >
                        <Icon size={20} />
                        <div>{title}</div>
                    </a>
                );
            })}
        </div>
    );
};

export default Sidebar;
