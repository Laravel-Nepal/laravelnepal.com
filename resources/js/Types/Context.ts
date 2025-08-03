import { Theme } from "@/Types/Enums";

export interface ThemeContextProps {
    theme: Theme;
    setTheme: (theme: Theme) => void;
    toggleTheme: () => void;
}
