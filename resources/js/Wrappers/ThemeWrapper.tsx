import ThemeContext from "@/Context/ThemeContext";
import { Theme } from "@/Types/Enums";
import type { LayoutProps } from "@/Types/Types";
import { type FC, useEffect, useState } from "react";

const ThemeWrapper: FC<LayoutProps> = (props) => {
    const { children } = props;

    const [theme, setTheme] = useState<Theme>(Theme.System);

    const updateTheme = (newTheme: Theme) => {
        setTheme(newTheme);

        if (newTheme === Theme.Light) {
            document.documentElement.classList.remove(Theme.Dark);
        } else if (newTheme === Theme.Dark) {
            document.documentElement.classList.add(Theme.Dark);
        } else {
            if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                document.documentElement.classList.add(Theme.Dark);
            } else {
                document.documentElement.classList.remove(Theme.Dark);
            }
        }
    };

    const toggleTheme = () => {
        if (theme === Theme.Light) {
            updateTheme(Theme.Dark);
        } else if (theme === Theme.Dark) {
            updateTheme(Theme.Light);
        } else {
            updateTheme(Theme.Light);
        }
    };

    const toggleThemeInDOMAndLocalStorage = () => {
        const htmlDOM = document.documentElement;
        if (theme === Theme.Light) {
            htmlDOM.classList.remove(Theme.Dark);
            localStorage.setItem("theme", Theme.Light);
        } else {
            htmlDOM.classList.add(Theme.Dark);
            localStorage.setItem("theme", Theme.Dark);
        }
    };

    useEffect(toggleThemeInDOMAndLocalStorage, [theme]);

    return (
        <ThemeContext.Provider
            value={{
                theme: theme,
                setTheme: updateTheme,
                toggleTheme: toggleTheme,
            }}
        >
            {children}
        </ThemeContext.Provider>
    );
};

export default ThemeWrapper;
