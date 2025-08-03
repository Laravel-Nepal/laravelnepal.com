import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Laravel Nepal";

    return <div className="flex h-screen w-screen flex-row items-center justify-center text-4xl text-white">{appName}</div>;
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
