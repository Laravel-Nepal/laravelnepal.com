import {type FC, useState} from "react";
import type {LayoutProps} from "@/Types/Types";
import ThemeContext from "@/Context/ThemeContext";
import {Theme} from "@/Types/Enums";

const ThemeWrapper: FC<LayoutProps> = (props) => {
    const {children} = props;

    const [theme, setTheme] = useState<Theme>(Theme.System);

    const toggleTheme = (newTheme: Theme) => {
        setTheme(newTheme);

        if (newTheme === Theme.Light) {
            document.documentElement.classList.remove(Theme.Dark);
        } else if (newTheme === Theme.Dark) {
            document.documentElement.classList.add(Theme.Dark);
        } else {
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add(Theme.Dark);
            } else {
                document.documentElement.classList.remove(Theme.Dark);
            }
        }
    }

    return <ThemeContext.Provider value={{
        theme: theme,
        setTheme: toggleTheme
    }}>{children}</ThemeContext.Provider>
};

export default ThemeWrapper;
