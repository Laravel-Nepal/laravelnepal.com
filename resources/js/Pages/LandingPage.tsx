const LandingPage = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Laravel Nepal";

    return (
        <div className="text-4xl text-white flex flex-row h-screen w-screen justify-center items-center">
            {appName}
        </div>
    );
};

export default LandingPage;
