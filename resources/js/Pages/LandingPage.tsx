import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Laravel Nepal";

    return (
        <>
            <div className="h-screen w-screen">
                <p className="relative bg-gradient-to-b from-neutral-200 to-red-500 bg-clip-text text-4xl font-bold text-transparent sm:text-7xl">
                    {appName}
                </p>
            </div>
            <div className="h-screen w-screen">{appName}</div>
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
