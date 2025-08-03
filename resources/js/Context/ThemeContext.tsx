import { createContext } from 'react';
import type {ThemeContextProps} from "@/Types/Context";

const ThemeContext = createContext<ThemeContextProps | undefined>(undefined);

export default ThemeContext;
