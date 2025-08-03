import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    return (
        <>
            <div className="flex min-h-screen w-full items-center justify-center">
                <h2 className="bg-gradient-to-b from-neutral-400 to-neutral-800 bg-clip-text py-20 text-3xl font-bold text-transparent lg:text-7xl dark:from-neutral-300 dark:to-neutral-500">
                    Something is cooking
                </h2>
            </div>
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
